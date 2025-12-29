<?php

namespace Modules\Coupon\Models;

use App\Models\BaseModel;
use App\Trait\CommonQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use CommonQuery;

    protected $table = 'coupon_code';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Coupon\database\factories\CouponFactory::new();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}

