<?php

use Illuminate\Support\Facades\Route;
use Modules\ProductBooking\Http\Controllers\Backend\OrdersController;

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
Route::group(['prefix' => 'app', 'as' => 'backend.', 'middleware' => ['auth']], function () {
    /*
    * These routes need view-backend permission
    * (good if you want to allow more than one group in the backend,
    * then limit the backend features by different roles or permissions)
    *
    * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
    */

    /*
     *
     *  Backend Orders Routes
     *
     * ---------------------------------------------------------------------
     */
     
     Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/index_data', [OrdersController::class, 'index_data'])->name('index_data');
        Route::get('/list_view', [OrdersController::class, 'list_view'])->name('list_view');
        Route::get('/index_list', [OrdersController::class, 'index_list'])->name('index_list');
        Route::get('/services-index_list', [OrdersController::class, 'services_index_list'])->name('services_index_list');
        Route::get('/trashed', [OrdersController::class, 'trashed'])->name('trashed');
        Route::patch('/trashed/{id}', [OrdersController::class, 'restore'])->name('restore');
        Route::post('/update-status/{id}', [OrdersController::class, 'updateStatus'])->name('updateStatus');
    });
    Route::get('orders-table-view', [OrdersController::class, 'datatable_view'])->name('orders.datatable_view');
    Route::resource('orders', OrdersController::class);
    
});
