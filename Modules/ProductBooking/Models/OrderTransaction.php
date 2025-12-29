<?php

namespace Modules\ProductBooking\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Commission\Models\CommissionEarning;
use Modules\Tip\Models\TipEarning;

class OrderTransaction extends Model
{
    use HasFactory;

    protected $table = "order_transactions";
    
    protected $fillable = ['order_id', 'external_transaction_id', 'transaction_type', 'discount_percentage', 'discount_amount', 'tip_amount', 'tax_percentage', 'payment_status'];

    protected $casts = [
        'tax_percentage' => 'array',
    ];

    protected static function newFactory()
    {
        return \Modules\ProductBooking\Database\factories\OrderTransactionFactory::new();
    }

    public function order()
    {
        return $this->belongsTo(Order::class)->with('products');
    }

}
