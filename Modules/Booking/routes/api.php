<?php

use Illuminate\Support\Facades\Route;
use Modules\Booking\Http\Controllers\Backend\API\BookingsController;
use Modules\Booking\Http\Controllers\Backend\API\PaymentController;

Route::get('booking-status', [BookingsController::class, 'statusList']);
Route::post('booking-status-update', [BookingsController::class,'vendorUpdateStatus']);

Route::get('get-booking-total', [BookingsController::class,'getBookingTotal']);

Route::group(['middleware' => 'auth:sanctum', 'as' => 'backend.'], function () { 
    Route::apiResource('bookings', BookingsController::class);
    Route::post('booking-update', [BookingsController::class, 'bookingUpdate']);
    Route::get('booking-list', [BookingsController::class, 'bookingList']);
    Route::get('booking-detail', [BookingsController::class, 'bookingDetail']);
    Route::get('search-booking', [BookingsController::class, 'searchBookings']);
    Route::post('save-booking', [BookingsController::class, 'store']);
    Route::post('save-payment', [PaymentController::class, 'savePayment']);
    Route::post('update-status', [BookingsController::class, 'updateStatus']);
    
    
});
Route::post('/razorpay-order-create', [PaymentController::class, 'RazorpayOrderCreate']);
    
Route::get('vendor-booking-list', [BookingsController::class,'vendorBookingList']);

Route::post('booking-vendor-product', [BookingsController::class, 'BookingVendorProduct']);

Route::post('booking-vendor-cancle', [BookingsController::class, 'BookingVendorCancle']);

Route::get('get-booking-vendor-product', [BookingsController::class, 'getBookingVendorProduct']);

 
