<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
// Auth::routes();

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/{any}', 'HomeController@category_product')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('category-product/{any}', 'Admin\ProductController@category_product')->middleware('auth');

Route::get('user/registration', 'HomeController@user_registration');
Route::post('user/store-registration', 'HomeController@store_registration');
Route::get('user/login', 'HomeController@user_login');
Route::post('user/login-check', 'HomeController@user_login_check');
Route::get('product/{any}', 'HomeController@product_details');

Route::get('get-terminal', 'HomeController@get_terminal');
Route::get('cabin/{any}', 'HomeController@get_cabin');
Route::post('search-schedules', 'HomeController@search_schedules');
Route::get('rooms-by-schdule', 'HomeController@get_rooms_by_schdule');
Route::get('room-price', 'HomeController@get_rooms_price');
Route::post('checkout', 'HomeController@checkout');
Route::post('booking', 'HomeController@booking');
Route::get('room-list', 'HomeController@category_wise_rooms');
Route::get('blog', 'HomeController@blog_details');
Route::get('all-blogs', 'HomeController@all_blogs');
Route::post('checkout', 'HomeController@checkout');
Route::get('pdf', 'HomeController@generate_pdf');
Route::get('booking/success', 'HomeController@booking_success');

// customer routes
Route::group(['middleware' => 'customer_authenticate'], function() {
    Route::get('user/profile', 'UserAccountController@user_profile');
    Route::get('user/edit-profile/{any}', 'UserAccountController@user_profile_edit');
    Route::put('user/update-profile/{any}', 'UserAccountController@user_profile_update');
    Route::get('user/logout', 'UserAccountController@user_logout');
    Route::post('user/change-password', 'UserAccountController@user_change_password');
});


// admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    //Vendors
    Route::post('vendor-list', 'Admin\VendorController@vendor_list');
    Route::resource('vendors', 'Admin\VendorController');
    //Role & Permission
    Route::resource('roles', 'Admin\RoleController');
    Route::resource('permissions', 'Admin\PermissionController');
    //Users
    Route::post('user-list', 'Admin\UserController@user_list');
    Route::resource('users', 'Admin\UserController');
    //Blog
    Route::resource('blogs', 'Admin\BlogController');
    //Customers
    Route::resource('customers', 'Admin\CustomerController');
    Route::post('customer-list', 'Admin\CustomerController@customer_list');
    Route::post('change-customer-status/{id}', 'Admin\CustomerController@change_status');
    //Custom Field
    Route::resource('custom-fields', 'Admin\CustomFieldController');
    Route::post('change-fields-status/{id}', 'Admin\CustomFieldController@change_status');
    //Launch
    Route::resource('launches', 'Admin\LaunchController');
    //Room
    Route::resource('rooms', 'Admin\RoomController');
    Route::post('room-image-upload', 'Admin\RoomController@room_image_upload');
    Route::get('get-rooms', 'Admin\RoomController@get_rooms');
    // schedule 
    Route::resource('launch-schedules', 'Admin\LaunchScheduleController');
    //Categories
    Route::resource('categories', 'Admin\CategoryController');
    //Sliders
    Route::resource('sliders', 'Admin\SliderController');
    //Types
    Route::resource('types', 'Admin\TypeController');
    //Terminal
    Route::resource('terminals', 'Admin\TerminalController');
    //Company
    Route::get('company', 'Admin\AdminController@index');
    Route::post('edit-company-data', 'Admin\AdminController@edit_company_data');
    
    Route::get('get-launch-schedules', 'Admin\LaunchScheduleController@get_launch_schedules');
    Route::resource('bookings', 'Admin\BookingController');
});

Route::get('get-states/{any}', 'Admin\CustomerController@get_states');



// SSLCOMMERZ Start
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END


