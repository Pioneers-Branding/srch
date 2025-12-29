<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\ChildCategory\Http\Controllers\API\ChildCategoryController;


Route::post('childcategory-list-by-sub-category', [ChildCategoryController::class, 'childCategoryBySubId']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('childcategory', ChildCategoryController::class);
    // Route::post('childcategory-list-by-sub-category', [ChildCategoryController::class, 'childCategoryBySubId']);
});