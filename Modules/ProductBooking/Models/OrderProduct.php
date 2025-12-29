<?php 

namespace Modules\ProductBooking\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\ShopProduct\Models\ShopProduct;

class OrderProduct extends Model
{
    use HasFactory;
    
    protected $table = "order_products";
    
    protected $fillable = ['sequance', 'order_id', 'product_id', 'price', 'quantity', 'status', 'start_date_time'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(ShopProduct::class)->with('media');
    }


    public function productCategory()
    {
        return $this->belongsTo(ShopProduct::class, 'product_id')->with('category');
    }
}
