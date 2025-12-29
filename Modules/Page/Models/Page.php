<?php

namespace Modules\Page\Models;

use App\Models\BaseModel;
use App\Models\Traits\HasSlug;
use App\Trait\CustomFieldsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Page extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;
    use CustomFieldsTrait;

    protected $table = 'pages';

    const CUSTOM_FIELD_MODEL = 'Modules\Page\Models\page';

    protected $fillable = ['slug','name','status','description'];

    protected $appends = ['feature_image'];
    


    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

     protected function getFeatureImageAttribute()
     {
         $media = $this->getFirstMediaUrl('feature_image');
     
         return isset($media) && !empty($media) ? $media : default_feature_image();
     }

    protected static function newFactory()
    {
        return \Modules\Page\database\factories\PageFactory::new();
    }
}
