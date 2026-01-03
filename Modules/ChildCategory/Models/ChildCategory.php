<?php

namespace Modules\ChildCategory\Models;

use App\Models\BaseModel;
use App\Models\Traits\HasSlug;
use App\Trait\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Service\Models\Service;
use Modules\Service\Models\ServiceBranches;
use Modules\Category\Models\Category;


class ChildCategory extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    use CustomFieldsTrait;

    protected $table = "childcategories";

    protected $fillable = ['name' , 'slug' , 'status' , 'sub_id'];

    const CUSTOM_FIELD_MODEL = 'Modules\ChildCategory\Models\ChildCategory';
    
    protected $appends = ['feature_image'];
    
    protected static function newFactory()
    {
        return \Modules\ChildCategory\Database\factories\ChildCategoryFactory::new();
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

    public function sub_category()
    {
        return $this->belongsTo(Category::class, 'sub_id');
    }
}

