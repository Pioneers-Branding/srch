<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\BranchController;
use App\Http\Controllers\Backend\NotificationsController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermission;
use App\Http\Controllers\SearchController;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

use Modules\Child\Http\Controllers\Backend\ChildController;

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

// Auth Routes
require __DIR__.'/auth.php';

Route::get('/storage-link', function () {
    Artisan::call("storage:link");
    return 'storage-link done';
});

Route::get('/cache-clear', function () {
    Artisan::call("cache:clear");
    return 'cache-clear done';
});


Route::get('/', [HomeController::class, 'index'])->name('front.index'); 

Route::get('/get-vendors', [HomeController::class, 'get_vendor_lat']);

// Route::get('/', function () {
    // if (auth()->user()->hasRole('employee')) {
    //     return redirect(RouteServiceProvider::EMPLOYEE_LOGIN_REDIRECT);
    // } else {
    //     return redirect(RouteServiceProvider::HOME);
    // }
    
// })->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::get('notification-list', [NotificationsController::class, 'notificationList'])->name('notification.list');
    Route::get('notification-counts', [NotificationsController::class, 'notificationCounts'])->name('notification.counts');
});

Route::group(['prefix' => 'app', 'middleware' => 'role:admin|manager'], function () {

    // Language Switch
    Route::get('language/{language}', [LanguageController::class, 'switch'])->name('language.switch');
    Route::post('set-user-setting', [BackendController::class, 'setUserSetting'])->name('backend.setUserSetting');

    Route::group(['as' => 'backend.', 'middleware' => ['auth']], function () {
        Route::post('update-player-id', [UserController::class, 'update_player_id'])->name('update-player-id');
        Route::get('get_search_data', [SearchController::class, 'get_search_data'])->name('get_search_data');

        // Sync Role & Permission
        Route::get('/permission-role', [RolePermission::class, 'index'])->name('permission-role.list')->middleware('password.confirm');
        Route::post('/permission-role/store/{role_id}', [RolePermission::class, 'store'])->name('permission-role.store');
        Route::get('/permission-role/reset/{role_id}', [RolePermission::class, 'reset_permission'])->name('permission-role.reset');
        // Role & Permissions Crud
        Route::resource('permission', PermissionController::class);
        Route::resource('role', RoleController::class);

        Route::group(['prefix' => 'module', 'as' => 'module.'], function () {

            Route::get('index_data', [ModuleController::class, 'index_data'])->name('index_data');
            Route::post('update-status/{id}', [ModuleController::class, 'update_status'])->name('update_status');
        });

        Route::resource('module', ModuleController::class);

        /*
          *
          *  Settings Routes
          *
          * ---------------------------------------------------------------------
          */
        Route::group(['middleware' => ['permission:edit_settings']], function () {
            Route::get('settings/{vue_capture?}', [SettingController::class, 'index'])->name('settings')->where('vue_capture', '^(?!storage).*$');
            Route::get('settings-data', [SettingController::class, 'index_data']);
            Route::post('settings', [SettingController::class, 'store'])->name('settings.store');
            Route::post('setting-update', [SettingController::class, 'update'])->name('setting.update');
            Route::get('clear-cache', [SettingController::class, 'clear_cache'])->name('clear-cache');
            Route::post('verify-email', [SettingController::class, 'verify_email'])->name('verify-email');
        });

        /*
        *
        *  Notification Routes
        *
        * ---------------------------------------------------------------------
        */
        Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
            Route::get('/', [NotificationsController::class, 'index'])->name('index');
            Route::get('/markAllAsRead', [NotificationsController::class, 'markAllAsRead'])->name('markAllAsRead');
            Route::delete('/deleteAll', [NotificationsController::class, 'deleteAll'])->name('deleteAll');
            Route::get('/{id}', [NotificationsController::class, 'show'])->name('show');

        });

        /*
        *
        *  Backup Routes
        *
        * ---------------------------------------------------------------------
        */
        Route::group(['prefix' => 'backups', 'as' => 'backups.'], function () {
            Route::get('/', [BackupController::class, 'index'])->name('index');
            Route::get('/create', [BackupController::class, 'create'])->name('create');
            Route::get('/download/{file_name}', [BackupController::class, 'download'])->name('download');
            Route::get('/delete/{file_name}', [BackupController::class, 'delete'])->name('delete');
        });

        Route::get('daily-booking-report', [ReportsController::class, 'daily_booking_report'])->name('reports.daily-booking-report');
        Route::get('daily-booking-report-index-data', [ReportsController::class, 'daily_booking_report_index_data'])->name('reports.daily-booking-report.index_data');
        Route::get('overall-booking-report', [ReportsController::class, 'overall_booking_report'])->name('reports.overall-booking-report');
        Route::get('overall-booking-report-index-data', [ReportsController::class, 'overall_booking_report_index_data'])->name('reports.overall-booking-report.index_data');
        Route::get('payout-report', [ReportsController::class, 'payout_report'])->name('reports.payout-report');
        Route::get('payout-report-index-data', [ReportsController::class, 'payout_report_index_data'])->name('reports.payout-report.index_data');
        Route::get('staff-report', [ReportsController::class, 'staff_report'])->name('reports.staff-report');
        Route::get('staff-report-index-data', [ReportsController::class, 'staff_report_index_data'])->name('reports.staff-report.index_data');

        // Review Routes
        Route::get('daily-booking-report-review', [ReportsController::class, 'daily_booking_report_review'])->name('reports.daily-booking-report-review');
        Route::get('overall-booking-report-review', [ReportsController::class, 'overall_booking_report_review'])->name('reports.overall-booking-report-review');
        Route::get('payout-report-review', [ReportsController::class, 'payout_report_review'])->name('reports.payout-report-review');
        Route::get('staff-report-review', [ReportsController::class, 'staff_report_review'])->name('reports.staff-report-review');
    });

    /*
    *
    * Backend Routes
    * These routes need view-backend permission
    * --------------------------------------------------------------------
    */
    Route::group(['as' => 'backend.', 'middleware' => ['auth']], function () {

        /**
         * Backend Dashboard
         * Namespaces indicate folder structure.
         */
        Route::get('/', [BackendController::class, 'index'])->name('home');

        Route::post('set-current-branch/{branch_id}', [BackendController::class, 'setCurrentBranch'])->name('set-current-branch');
        Route::post('reset-branch', [BackendController::class, 'resetBranch'])->name('reset-branch');

        Route::group(['prefix' => ''], function () {
            Route::get('dashboard', [BackendController::class, 'index'])->name('dashboard');
            /**
             * Branch Routes
             */
            Route::group(['prefix' => 'branch', 'as' => 'branch.'], function () {
                Route::get('index_list', [BranchController::class, 'index_list'])->name('index_list');
                Route::get('assign/{id}', [BranchController::class, 'assign_list'])->name('assign_list');
                Route::post('assign/{id}', [BranchController::class, 'assign_update'])->name('assign_update');
                Route::get('index_data', [BranchController::class, 'index_data'])->name('index_data');
                Route::get('trashed', [BranchController::class, 'trashed'])->name('trashed');
                Route::patch('trashed/{id}', [BranchController::class, 'restore'])->name('restore');
                // Branch Gallery Images
                Route::get('gallery-images/{id}', [BranchController::class, 'getGalleryImages']);
                Route::post('gallery-images/{id}', [BranchController::class, 'uploadGalleryImages']);
                Route::post('bulk-action', [BranchController::class, 'bulk_action'])->name('bulk_action');
                Route::post('update-status/{id}', [BranchController::class, 'update_status'])->name('update_status');
                Route::post('update-select-value/{id}/{action_type}', [BranchController::class, 'update_select'])->name('update_select');
                Route::post('branch-setting', [BranchController::class, 'UpdateBranchSetting'])->name('branch_setting');

            });
            Route::get('branch-info', [BranchController::class, 'branchData'])->name('branchData');
            Route::resource('branch', BranchController::class);

            /*
            *
            *  Users Routes
            *
            * ---------------------------------------------------------------------
            */
            Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
                Route::get('user-list', [UserController::class, 'user_list'])->name('user_list');
                Route::get('emailConfirmationResend/{id}', [UserController::class, 'emailConfirmationResend'])->name('emailConfirmationResend');
                Route::post('create-customer', [UserController::class, 'create_customer'])->name('create_customer');
                Route::post('information', [UserController::class, 'update'])->name('information');
            });
            
            Route::post('change-password', [UserController::class, 'change_password'])->name('change_password');

             });
            Route::get('my-profile/{vue_capture?}', [UserController::class, 'myProfile'])->name('my-profile')->where('vue_capture', '^(?!storage).*$');
            Route::get('my-info', [UserController::class, 'authData'])->name('authData');
    });
    
});
// this route for frontend
Route::get('/home', [HomeController::class, 'index'])->name('front.index');
Route::get('/about', [HomeController::class, 'about'])->name('front.about');
Route::get('/coaches', [HomeController::class, 'coaches'])->name('front.coaches');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('front.testimonials');
Route::get('/coaching', [HomeController::class, 'coaching'])->name('front.coaching');
Route::get('/chess-coffee-connect/{category_slug?}', [HomeController::class, 'Chesscofee'])->name('front.chess-coffee-connect');
Route::get('/service/{category_slug?}/{sub_category_slug?}', [HomeController::class, 'service'])->name('front.services');
Route::get('/chess-consultation/{category_slug?}', [HomeController::class, 'chessconsultation'])->name('front.chess-consultation');
Route::get('/workshops/{category_slug?}/{sub_category_slug?}', [HomeController::class, 'workshops'])->name('front.workshops');
Route::get('/faq', [HomeController::class, 'faq'])->name('front.faq');
Route::get('/checkout-coaching/{title}/{price}', [HomeController::class, 'checkout_coching'])->name('front.checkout_coching');
Route::post('/apply-coupon', [HomeController::class, 'applyCoupon']);
Route::get('/gallery', [HomeController::class, 'gallery'])->name('front.gallery');
Route::get('/coaches_details', [HomeController::class, 'coaches_details'])->name('front.coaches_details');
Route::post('/subscribe-newsletter', [HomeController::class, 'sendNewsletterEmail'])->name('subscribe.newsletter');
Route::get('/social-media-management', [HomeController::class, 'socialMediaManagement'])->name('front.media_management');
Route::get('/career', [HomeController::class, 'career'])->name('front.career');




Route::get('/sitemap', [HomeController::class, 'sitemap'])->name('front.sitemap');
Route::get('/blog', [HomeController::class, 'blog'])->name('front.blog');
Route::get('/blog-detail/{id}', [HomeController::class, 'blogDetail'])->name('front.blog.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('front.contact');
Route::post('/contact', [HomeController::class, 'storeContact'])->name('front.contact.store');


// Route::get('/service/{category_id?}/{sub_category_id?}', [HomeController::class, 'category'])->name('front.category');
Route::get('/service_details/{id}', [HomeController::class, 'service_details'])->name('front.service_details');
Route::get('/service_list', [HomeController::class, 'service_list'])->name('front.service_list');

// product route
Route::get('/buy_chess_merchandise', [HomeController::class, 'product_list'])->name('front.product_list');
Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('front.product_details');
Route::get('/product/{category_id?}', [HomeController::class, 'showCategory'])->name('front.product_category');
Route::get('/cart', [HomeController::class, 'cart'])->name('front.cart');

// ✅ Put this first
Route::get('/checkout/cart', [HomeController::class, 'cartCheckout'])->name('front.checkout.cart');
// ⏬ Then this
Route::get('/checkout/{id}', [HomeController::class, 'checkout'])->name('front.checkout');

// Route::get('/checkout/{id}', [HomeController::class, 'checkout'])->name('front.checkout');
// Route::get('/checkout/cart', [HomeController::class, 'cartCheckout'])->name('front.checkout.cart');


Route::get('/programs', [HomeController::class, 'programs'])->name('front.programs');
Route::get('/programs_description', [HomeController::class, 'programs_description'])->name('front.programs_description');
Route::get('/enroll_now', [HomeController::class, 'enrollnow'])->name('front.enroll_now');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('front.privacy');
Route::get('/shipping_policy', [HomeController::class, 'shipping'])->name('front.shipping_policy');
Route::get('/terms-conditions', [HomeController::class, 'termsconditions'])->name('front.terms-conditions');
Route::get('/stress_test', [HomeController::class, 'stress_test'])->name('front.stress_test');
Route::get('/chess_trivia', [HomeController::class, 'chess_trivia'])->name('front.chess_trivia');
Route::get('/stress_test_parents', [HomeController::class, 'stress_test_parents'])->name('front.stress_test_parents');
Route::get('/stress_test_children', [HomeController::class, 'stress_test_children'])->name('front.stress_test_children');
Route::get('/service-checkout', [HomeController::class, 'servicecheckout'])->name('front.service-checkout');




Route::get('/signup', [HomeController::class, 'signup'])->name('front.signup');
Route::get('/signin', [HomeController::class, 'signin'])->name('front.signin');
Route::get('/forgotpassword', [HomeController::class, 'forgotpassword'])->name('front.forgotpassword');
Route::get('/mybooking', [HomeController::class, 'mybooking'])->name('front.user_booking');
Route::get('/return-refund-policy', [HomeController::class, 'returnrefundpolicy'])->name('front.return-refund-policy');

Route::get('/booking-details/{id}', [HomeController::class, 'bookingdetails'])->name('front.bookingdetails');
Route::get('/service-booking/{service_id?}', [HomeController::class, 'service_booking'])->name('front.service_booking');
Route::get('/user-profile', [HomeController::class, 'updateprofile'])->name('front.user_profile');

Route::post('/store-booking-details', [HomeController::class, 'storeBookingDetails'])->name('store.booking.details');

// routes/web.php
Route::post('/store-checkout', [HomeController::class, 'storeCheckoutDetails'])->name('store.checkout');


//PAYMENT FORM
Route::get('payment-phonepe', [HomeController::class, 'paymentView'])->name('payment.phonepe');
 
//SUBMIT PAYMENT FORM ROUTE
Route::post('pay-now', [HomeController::class, 'submitPaymentForm'])->name('pay-now-phonepe');
 
//CALLBACK ROUTE
Route::get('confirm', [HomeController::class, 'confirmPayment'])->name('confirm.phonepe');
 


