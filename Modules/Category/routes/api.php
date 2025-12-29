<?php
use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\Backend\API\CategoryController;

Route::get('category-list', [CategoryController::class, 'categoryList']);
Route::post('category-detail', [CategoryController::class, 'categoryDetails']);

Route::post('subcategory-detail', [CategoryController::class, 'subCategoryDetail']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('category', CategoryController::class);
    
    Route::get('subcategory-list', [CategoryController::class, 'subCategoryList']);
    
    Route::get('subcategories', [CategoryController::class, 'index_SubCategory']);
});
?>


