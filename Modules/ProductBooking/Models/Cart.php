<?php

namespace Modules\ProductBooking\Models;

use App\Models\BaseModel;
use App\Models\User;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Commission\Trait\CommissionTrait;
use Modules\ShopProduct\Models\ShopProduct;
use Modules\Service\Models\Service;
use Modules\Tip\Trait\TipTrait;

class Cart extends BaseModel
{
    use HasFactory;
    // use SoftDeletes;
    use CommissionTrait;
    use TipTrait;

    protected $table = 'cart';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\ProductBooking\database\factories\CartFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(ShopProduct::class, 'product_id');
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
