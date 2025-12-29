<?php

namespace Modules\Booking\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Service\Models\Service;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Modules\ShopProduct\Models\ShopProduct;

class BookingVendorProduct extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'booking_vendor_products';

    const CUSTOM_FIELD_MODEL = 'Modules\Booking\Models\BookingVendorProduct';

    protected $fillable = ['booking_id', 'booking_id_img', 'product_name','user_id', 'product_id', 'quantity',  'status'];

    protected $appends = ['product_image'];
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('product_image');
        // Add more collections if needed
    }

    protected static function newFactory()
    {
        return \Modules\Booking\Database\Factories\BookingVendorProductFactory::new(); // Fix the namespace for the factory
    }

    protected static function boot()
    {
        parent::boot();

        // Creating event handler
        static::creating(function ($table) {
            //
        });

        // Saving event handler
        static::saving(function ($table) {
            //
        });

        // Updating event handler
        static::updating(function ($table) {
            //
        });
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    
    public function product()
    {
        return $this->belongsTo(ShopProduct::class , 'product_id' , 'id');
    }

    // Accessor to retrieve the product image
    public function getProductImageAttribute()
    {
        $media = $this->getFirstMediaUrl('product_image');

        return isset($media) && !empty($media) ? $media : default_feature_image();
    }
}
