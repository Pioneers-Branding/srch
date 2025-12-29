<?php

namespace App\Models;

use App\Models\Traits\HasHashedMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;

class WalletTransactions extends BaseModel 
{

    protected $table = 'wallet_transactions';

  
    protected static function boot()
    {
        parent::boot();

        static::updated(function () {
            
        });

        static::created(function () {
            
        });

        static::deleted(function () {
            
        });
    }
}
