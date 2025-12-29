<?php

use Illuminate\Support\Facades\Route;
use Modules\ShopProduct\Http\Controllers\Backend\ShopProductController;
/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
*
* Backend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['prefix' => 'app', 'as' => 'backend.', 'middleware' => ['web', 'auth']], function () {
    /*
    * These routes need view-backend permission
    * (good if you want to allow more than one group in the backend,
    * then limit the backend features by different roles or permissions)
    *
    * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
    */

    /*
     *
     *  Backend Services Routes
     *
     * ---------------------------------------------------------------------
     */
    // Services Routes
    Route::group(['prefix' => 'shopproduct', 'as' => 'shopproduct.'], function () {

        Route::get('/category_list', [ShopProductController::class, 'category_list'])->name('category_list');
        Route::get('/index_data', [ShopProductController::class, 'index_data'])->name('index_data');
        Route::get('/trashed', [ShopProductController::class, 'trashed'])->name('trashed');
        Route::patch('/trashed/{id}', [ShopProductController::class, 'restore'])->name('restore');

        Route::get('/index_list_data', [ShopProductController::class, 'index_list_data'])->name('index_list_data');
        Route::post('update-status/{id}', [ShopProductController::class, 'update_status'])->name('update_status');
        
    });

    Route::resource('shopproduct', ShopProductController::class);


});
