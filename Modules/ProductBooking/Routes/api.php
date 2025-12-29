<?php

use Illuminate\Support\Facades\Route;
use Modules\ProductBooking\Http\Controllers\Backend\API\OrdersController;
use Modules\ProductBooking\Http\Controllers\Backend\API\PaymentController;

use Modules\ProductBooking\Http\Controllers\Backend\API\CartController;
use Modules\ProductBooking\Http\Controllers\Backend\API\WishlistController;

Route::get('order-status', [OrdersController::class, 'statusList']);

Route::get('order-status-update', [OrdersController::class,'UpdateStatus']);

Route::group(['middleware' => 'auth:sanctum', 'as' => 'backend.'], function () { 
    Route::apiResource('orders', OrdersController::class);
    Route::post('order-update', [OrdersController::class, 'orderUpdate']);
    Route::get('order-list', [OrdersController::class, 'orderList']);
    Route::get('order-detail', [OrdersController::class, 'orderDetail']);
    Route::get('search-order', [OrdersController::class, 'searchOrders']);
    
});

Route::get('order-list', [OrdersController::class, 'orderList']);
Route::post('save-order', [OrdersController::class, 'store']);
Route::post('save-order-payment', [PaymentController::class, 'savePayment']);


// =============== this route for wishlist =============



// =============== this route for cart ====================

Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::post('update-cart', [CartController::class, 'addToCart']);
Route::post('remove-cart', [CartController::class, 'removeFromCart']);
Route::get('get-cart-list', [CartController::class, 'getCart']);

// =============== this route for vendor Stock ====================

Route::get('get-vendor-stock', [OrdersController::class, 'vendorStock']);
Route::get('search-product-list', [OrdersController::class, 'productSearch']);



