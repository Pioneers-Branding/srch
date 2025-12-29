
<?php

use Illuminate\Support\Facades\Route;
use Modules\ChildCategory\Http\Controllers\ChildCategoryController;

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
     *  Backend Categories Routes
     *
     * ---------------------------------------------------------------------
     */

     

    Route::group(['prefix' => 'childcategories', 'as' => 'childcategories.'], function () {
        
        
        Route::get('index_list', [ChildCategoryController::class, 'index_list'])->name('index_list');
        Route::get('index_data', [ChildCategoryController::class, 'index_data'])->name('index_data');
        Route::post('bulk-action', [ChildCategoryController::class, 'bulk_action'])->name('bulk_action');
        Route::post('update-status/{id}', [ChildCategoryController::class, 'update_status'])->name('update_status');
        Route::get('export', [ChildCategoryController::class, 'export'])->name('export');
    });
    // Route::get('childcategories', [ChildCategoryController::class, 'index'])->name('childcategories');

    Route::resource('childcategories', ChildCategoryController::class);
});