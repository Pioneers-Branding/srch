<?php

namespace Modules\Service\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceStep extends BaseModel
{
    use HasFactory;

    protected $fillable = ['service_id', 'full_url', 'status' , 'step' ,'description'];

    protected static function newFactory()
    {
        return \Modules\Service\Database\factories\ServiceStepFactory::new();
    }

    /**
     * Get the service that owns the ServiceStep
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
