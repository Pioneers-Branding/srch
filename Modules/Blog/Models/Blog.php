<?php

namespace Modules\Blog\Models;

use App\Models\BaseModel;
use App\Models\Traits\HasSlug;
use App\Trait\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\Category;

class Blog extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    use CustomFieldsTrait;

    protected $table = 'blogs';

    protected $fillable = ['slug', 'name', 'status', 'description' , 'category_id'];

    const CUSTOM_FIELD_MODEL = 'Modules\Blog\Models\Blog';

    protected $appends = ['blog_image' , 'banner'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Blog\database\factories\BlogFactory::new();
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
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected function getBlogImageAttribute()
    {
        $media = $this->getFirstMediaUrl('blog_image');
        $url = isset($media) && ! empty($media) ? $media : default_feature_image();

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return parse_url($url, PHP_URL_PATH);
        }

        return $url;
    }

    protected function getBannerAttribute()
    {
        $media = $this->getFirstMediaUrl('banner');
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
