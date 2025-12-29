<?php
use Illuminate\Support\Facades\Route;
use Modules\ShopProduct\Http\Controllers\Backend\API\ShopProductController;


Route::get('shop-product-list', [ShopProductController::class, 'ProductList']);
Route::get('shop-product-detail', [ShopProductController::class,'productDetail']);

?>


