<?php

use App\Http\Controllers\Auth\API\AuthController;
use App\Http\Controllers\Backend\API\BranchController;
use App\Http\Controllers\Backend\API\DashboardController;
use App\Http\Controllers\Backend\API\NotificationsController;
use App\Http\Controllers\Backend\API\SettingController;
use App\Http\Controllers\Backend\API\UserApiController;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('branch-list', [BranchController::class, 'branchList']);
Route::get('user-detail', [AuthController::class, 'userDetails']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('vendor-register', 'vendorRegister');
    Route::post('register', 'register');
    Route::post('login_otp', 'login_otp');
    Route::post('login', 'login');
    Route::post('social-login', 'socialLogin');
    Route::post('forgot-password', 'forgotPassword');
    Route::get('logout', 'logout');
});

Route::get('dashboard-detail', [DashboardController::class, 'dashboardDetail']);
Route::get('branch-configuration', [BranchController::class, 'branchConfig']);
Route::get('branch-detail', [BranchController::class, 'branchDetails']);
Route::get('branch-service', [BranchController::class, 'branchService']);
Route::get('branch-review', [BranchController::class, 'branchReviews']);
Route::get('branch-employee', [BranchController::class, 'branchEmployee']);
Route::get('branch-gallery', [BranchController::class, 'branchGallery']);

Route::group(['middleware' => 'auth:sanctum'], function () {
Route::post('branch/assign/{id}', [BranchController::class, 'assign_update']);
    Route::apiResource('branch', BranchController::class);
    Route::apiResource('user', UserApiController::class);
    Route::apiResource('setting', SettingController::class);
    Route::apiResource('notification', NotificationsController::class);
    Route::get('notification-list', [NotificationsController::class, 'notificationList']);
    Route::get('gallery-list', [DashboardController::class, 'globalGallery']);
    Route::get('search-list', [DashboardController::class, 'searchList']);
    Route::post('update-profile', [AuthController::class, 'updateProfile']);

    Route::post('change-password', [AuthController::class, 'changePassword']);
    Route::post('delete-account', [AuthController::class, 'deleteAccount']);

    Route::post('verify-slot', [BranchController::class, 'verifySlot']);
});
Route::get('app-configuration', [SettingController::class, 'appConfiguraton']);


// add amount to user wallet 
Route::post('add-amount-wallet', [DashboardController::class, 'addWallet']);
Route::get('get-wallet', [DashboardController::class, 'getWallet']);
Route::get('get-wallet-history', [DashboardController::class, 'getWalletHistory']);

// user address retrive add 

Route::get('get-address', [DashboardController::class, 'getUserAddress']);
Route::post('save-address', [DashboardController::class, 'saveUserAddress']); 
Route::post('delete-address', [DashboardController::class, 'deleteUserAddress']);

Route::get('call-connect', [DashboardController::class, 'callConnect']);
