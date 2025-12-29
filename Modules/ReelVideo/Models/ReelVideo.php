<?php

namespace Modules\ReelVideo\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReelVideo extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'videos';

    const CUSTOM_FIELD_MODEL = 'Modules\ReelVideo\Models\ReelVideo';

    protected $appends = ['name','question', 'options', 'correct_answer'];

    // Specify fillable fields to protect against mass assignment
    protected $fillable = [
        'name',
        'status',
        'question',
        'options',
        'correct_answer',
    ];
    
    public function getNameAttribute()
   {
    return $this->attributes['name'] ?? ''; // Return 'name' or empty string if not set
   }

   public function getQuestionAttribute()
   {
       return $this->attributes['question'] ?? ''; // Return question or empty string
   }

   public function getOptionsAttribute()
   {
       return json_decode($this->attributes['options'], true) ?? []; // Return options as array
   }

   public function getCorrectAnswerAttribute()
   {
       return $this->attributes['correct_answer'] ?? ''; // Return correct_answer or empty string
   }

   
    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Slider\database\factories\ReelvideoFactory::new();
    }

    // protected function getVideoAttribute()
    // {
    //     $media = $this->getFirstMediaUrl('video');

    //     return isset($media) && ! empty($media) ? $media : '';
    // }

    // protected function getThumbnailAttribute()
    // {
    //     $media = $this->getFirstMediaUrl('thumbnail');

    //     return isset($media) && ! empty($media) ? $media : default_feature_image();
    // }

    

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
