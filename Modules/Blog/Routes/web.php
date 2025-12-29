<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Backend\BlogController;

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
     *  Backend blogs Routes
     *
     * ---------------------------------------------------------------------
     */
  
    Route::group(['prefix' => 'blogs', 'as' => 'blogs.'], function () {
        Route::get('index_list', [BlogController::class, 'index_list'])->name('index_list');
        Route::get('index_data', [BlogController::class, 'index_data'])->name('index_data');
        Route::post('bulk-action', [BlogController::class, 'bulk_action'])->name('bulk_action');
        Route::post('update-status/{id}', [BlogController::class, 'update_status'])->name('update_status');
        Route::get('export', [BlogController::class, 'export'])->name('export');
    });

    Route::resource('blogs', BlogController::class);
});
