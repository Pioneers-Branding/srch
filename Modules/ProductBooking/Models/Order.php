<?php

namespace Modules\ProductBooking\Models;

use App\Models\BaseModel;
use App\Models\User;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Commission\Trait\CommissionTrait;
use Modules\ShopProduct\Models\ShopProduct;
use Modules\Tip\Trait\TipTrait;
use App\Models\Address;

class Order extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use CommissionTrait;
    use TipTrait;

    protected $table = 'orders';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\ProductBooking\database\factories\OrderFactory::new();
    }


    public function products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id')
            ->leftJoin('shop_products', 'order_products.product_id', 'shop_products.id')
            ->select('shop_products.name as product_name', 'order_products.*');
    }

    //     public function services()
    //    {
    //     return $this->hasMany(BookingService::class, 'booking_id')
    //         ->with('employee')
    //         ->leftJoin('services', 'booking_services.service_id', 'services.id')
    //         ->leftJoin('media', function ($join) {
    //             $join->on('services.id', '=', 'media.model_id')
    //                  ->where('media.model_type', '=', 'Modules\Service\Models\Service')
    //                  ->where('media.collection_name', '=', 'feature_image');
    //         })
    //         ->select('services.name as service_name', 'booking_services.*', 'media.file_name as service_image','media.id as media_id');
    //      }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id')->with('product');
    }

    // public function product()
    // {
    //     return $this->hasMany(OrderProduct::class, 'id', 'order_id');
    // }

    public function mainProducts()
    {
        return $this->hasManyThrough(ShopProduct::class, OrderProduct::class, 'order_id', 'id', 'id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function OrderTransaction()
    {
        return $this->hasOne(OrderTransaction::class)->where('payment_status', 1);
    }

    public function payment()
    {
        return $this->hasOne(OrderTransaction::class);
    }



    // Reports Query
    public static function dailyReport()
    {
        return self::select(
            DB::raw('DATE(orders.start_date_time) AS start_date_time'),
            DB::raw('COUNT(DISTINCT orders.id) AS total_booking'),
            DB::raw('COUNT(DISTINCT order_products.product_id) AS total_service'),
            DB::raw('COALESCE(SUM(tip_earnings.tip_amount), 0) AS total_tip_amount'),
            DB::raw('COALESCE(SUM(DISTINCT order_products.price), 0) as total_service_amount'),
            DB::raw('SUM(CASE
              WHEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.type\')) = \'percent\' THEN order_products.price * JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.percent\')) / 100
              WHEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.type\')) = \'fixed\' THEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.tax_amount\'))
              ELSE 0
          END) AS total_tax_amount'),
            DB::raw('COALESCE(SUM(tip_earnings.tip_amount), 0) +
              SUM(CASE
                  WHEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.type\')) = \'percent\' THEN order_products.price * JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.percent\')) / 100
                  WHEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.type\')) = \'fixed\' THEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.tax_amount\'))
                  ELSE 0
              END) + COALESCE(SUM(DISTINCT order_products.price), 0) AS total_amount')
        )
            ->leftJoin('order_products', 'orders.id', '=', 'order_products.order_id')
            ->leftJoin('tip_earnings', function ($join) {
                $join->on('orders.id', '=', 'tip_earnings.tippable_id')
                    ->where('tip_earnings.tippable_type', '=', 'Modules\\ProductBooking\\Models\\Order');
            })
            ->leftJoin(DB::raw('(SELECT
                  order_id,
                  CONCAT(
                      \'{ "type": "\', jt.type, \'", "percent": \', jt.percent, \'", "tax_amount": \', jt.tax_amount, \' }\'
                  ) AS tax_info
              FROM (
                  SELECT
                      order_id,
                      JSON_UNQUOTE(JSON_EXTRACT(tax_percentage, CONCAT(\'$[\', idx, \'].type\'))) AS type,
                      JSON_UNQUOTE(JSON_EXTRACT(tax_percentage, CONCAT(\'$[\', idx, \'].percent\'))) AS percent,
                      JSON_UNQUOTE(JSON_EXTRACT(tax_percentage, CONCAT(\'$[\', idx, \'].tax_amount\'))) AS tax_amount
                  FROM order_transactions
                  CROSS JOIN (
                      SELECT 0 AS idx UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3
                  ) AS indices
                  WHERE idx < JSON_LENGTH(tax_percentage)
              ) AS jt
              GROUP BY order_id, jt.type, jt.percent, jt.tax_amount) AS tx'), 'orders.id', '=', 'tx.order_id')
            ->where('orders.status', 'completed')
            ->groupBy('start_date_time');
    }

    public static function overallReport()
    {
        return self::select(
            'orders.id as id',
            DB::raw('COALESCE(SUM(order_products.price), 0) as total_service_amount'),
            DB::raw('COUNT(DISTINCT order_products.product_id) AS total_service'),
            DB::raw('SUM(CASE
              WHEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.type\')) = \'percent\' THEN order_products.price * JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.percent\')) / 100
              WHEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.type\')) = \'fixed\' THEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.tax_amount\'))
              ELSE 0
          END) AS total_tax_amount'),
            DB::raw('COALESCE(SUM(tip_earnings.tip_amount), 0) +
            SUM(CASE
                WHEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.type\')) = \'percent\' THEN order_products.price * JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.percent\')) / 100
                WHEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.type\')) = \'fixed\' THEN JSON_UNQUOTE(JSON_EXTRACT(tx.tax_info, \'$.tax_amount\'))
                ELSE 0
            END) + COALESCE(SUM(DISTINCT order_products.price), 0) AS total_amount'),
            DB::raw('COALESCE(SUM(tip_earnings.tip_amount), 0) AS total_tip_amount'),
            'orders.start_date_time')
            ->leftJoin('tip_earnings', function ($join) {
                $join->on('orders.id', '=', 'tip_earnings.tippable_id')
                    ->where('tip_earnings.tippable_type', '=', 'Modules\\ProductBooking\\Models\\Order');
            })
            ->leftJoin('order_products', 'orders.id', '=', 'order_products.order_id')
            ->leftJoin(DB::raw('(SELECT
                  order_id,
                  CONCAT(
                      \'{ "type": "\', jt.type, \'", "percent": \', jt.percent, \'", "tax_amount": \', jt.tax_amount, \' }\'
                  ) AS tax_info
              FROM (
                  SELECT
                      order_id,
                      JSON_UNQUOTE(JSON_EXTRACT(tax_percentage, CONCAT(\'$[\', idx, \'].type\'))) AS type,
                      JSON_UNQUOTE(JSON_EXTRACT(tax_percentage, CONCAT(\'$[\', idx, \'].percent\'))) AS percent,
                      JSON_UNQUOTE(JSON_EXTRACT(tax_percentage, CONCAT(\'$[\', idx, \'].tax_amount\'))) AS tax_amount
                  FROM order_transactions
                  CROSS JOIN (
                      SELECT 0 AS idx UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3
                  ) AS indices
                  WHERE idx < JSON_LENGTH(tax_percentage)
              ) AS jt
              GROUP BY order_id, jt.type, jt.percent, jt.tax_amount) AS tx'), 'orders.id', '=', 'tx.order_id')
            ->where('orders.status', 'completed')
            ->groupBy('orders.id', 'orders.start_date_time');
    }
}
