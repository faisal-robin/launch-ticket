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
    //Customers
    Route::resource('customers', 'Admin\CustomerController');
    Route::post('customer-list', 'Admin\CustomerController@customer_list');
    Route::post('change-customer-status/{id}', 'Admin\CustomerController@change_status');
    //Custom Field
    Route::resource('custom-fields', 'Admin\CustomFieldController');
    Route::post('change-fields-status/{id}', 'Admin\CustomFieldController@change_status');
    //Launch
    Route::resource('launches', 'Admin\LaunchController');
    //Categories
    Route::resource('categories', 'Admin\CategoryController');
    //Sliders
    Route::resource('sliders', 'Admin\SliderController');
    //Types
    Route::resource('types', 'Admin\TypeController');
    //Company
    Route::get('company', 'Admin\AdminController@index');
    Route::post('edit-company-data', 'Admin\AdminController@edit_company_data');
});

Route::get('get-states/{any}', 'Admin\CustomerController@get_states');

Route::group(['prefix' => 'cart'], function() {
    Route::get('cart-list', 'CartController@index');
    Route::get('add-to-cart', 'CartController@add_cart');
    Route::get('update-to-cart', 'CartController@update_cart');
    Route::get('delete-to-cart', 'CartController@delete_cart');
    Route::get('go-to-checkout', 'CartController@go_to_checkout');
    Route::get('checkout', 'CartController@checkout');
    Route::get('place-order', 'CartController@place_order');
    Route::get('get-cart', 'CartController@get_cart');
});
//Route::get('product_info/{any}', ['as' => 'product_slug', 'jdytk' => 'HomeController@product_details']);
Route::get('product/{any}', 'HomeController@product_details');

