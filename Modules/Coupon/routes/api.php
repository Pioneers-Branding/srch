<?php
use Illuminate\Support\Facades\Route;
use Modules\Coupon\Http\Controllers\Backend\API\CouponsController;


Route::post('apply-coupon', [CouponsController::class, 'applyCoupon']);
?>
