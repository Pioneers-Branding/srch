<?php
use Illuminate\Support\Facades\Route;
use Modules\ShopCategory\Http\Controllers\Backend\API\ShopCategoryController;

Route::get('shop-category-list', [ShopCategoryController::class, 'categoryList']);
Route::post('shop-category-detail', [ShopCategoryController::class, 'categoryDetails']);

?>


