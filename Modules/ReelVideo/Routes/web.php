<?php

use Illuminate\Support\Facades\Route;
use Modules\ReelVideo\Http\Controllers\ReelVideoController;

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
     *  Backend Sliders Routes
     *
     * ---------------------------------------------------------------------
     */

    Route::group(['prefix' => 'reelvideo', 'as' => 'videos.'], function () {
        Route::get('index_list', [ReelVideoController::class, 'index_list'])->name('index_list');
        Route::get('index_data', [ReelVideoController::class, 'index_data'])->name('index_data');
        Route::get('trashed', [ReelVideoController::class, 'trashed'])->name('trashed');
        Route::patch('trashed/{id}', [ReelVideoController::class, 'restore'])->name('restore');
        Route::post('update-status/{id}', [ReelVideoController::class, 'update_status'])->name('update_status');
    });
    Route::resource('videos', ReelVideoController::class);
});
