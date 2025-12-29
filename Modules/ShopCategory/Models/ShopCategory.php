<?php

namespace Modules\ShopCategory\Models;

use App\Models\BaseModel;
use App\Models\Traits\HasSlug;
use App\Trait\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Service\Models\Service;
use Modules\Service\Models\ServiceBranches;

class ShopCategory extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    use CustomFieldsTrait;

    protected $table = 'shop_categories';

    protected $fillable = ['slug', 'name', 'status'];

    const CUSTOM_FIELD_MODEL = 'Modules\ShopCategory\Models\ShopCategory';

    protected $appends = ['feature_image'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\ShopCategory\database\factories\ShopCategory::new();
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

    protected function getFeatureImageAttribute()
    {
        $media = $this->getFirstMediaUrl('feature_image');

        return isset($media) && ! empty($media) ? $media : default_feature_image();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
