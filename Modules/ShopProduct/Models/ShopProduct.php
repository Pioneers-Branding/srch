<?php

namespace Modules\ShopProduct\Models;

use App\Models\BaseModel;
use App\Models\Traits\HasSlug;
use App\Trait\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\ShopCategory\Models\ShopCategory;

class ShopProduct extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    use CustomFieldsTrait;

    protected $table = 'shop_products';

    protected $fillable = ['slug', 'name', 'description', 'quantity', 'default_price', 'category_id', 'status'];

    const CUSTOM_FIELD_MODEL = 'Modules\ShopProduct\Models\ShopProduct';

    protected $append = ['feature_image'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\ShopProduct\database\factories\ShopProduct::new();
    }

    protected static function boot()
    {
        parent::boot();

        // create a event to happen on creating
        static::creating(function ($table) {
            //
        });

        static::saving(function ($table) {
            //
        });

        static::updating(function ($table) {
            //
        });
    }

    public function category()
    {
        return $this->belongsTo(ShopCategory::class, 'category_id');
    }

    protected function getFeatureImageAttribute()
    {
        $media = $this->getFirstMediaUrl('feature_image');
        $url = isset($media) && ! empty($media) ? $media : default_feature_image();

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return parse_url($url, PHP_URL_PATH);
        }

        return $url;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
