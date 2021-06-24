<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\Cakes;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DeliveryPersonController;
use App\Http\Controllers\Vendors;
use App\Http\Controllers\VendorDelivery;
use App\Http\Controllers\Coupons;
use App\Http\Controllers\CoustomizeController;
use App\Http\Controllers\Admin;

use App\Http\Controllers\ForgotPasswordController;

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

Route::get('/',[Home::class, "index"])->name('home');

Route::get('/new_login',[Home::class, "login"])->name('new_login');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::post('/customize',[CoustomizeController::class,"index"])->name('customize');
Route::get('/search', [Home::class, 'search']);
Route::get('/aboutus', [Home::class,"aboutus"])->name('aboutus');
Route::get('/shop_cakes', [Home::class,"shop_cakes"])->name('shop_cakes');
Route::get('/category/{id}',[Home::class, "fillter"])->name('category');
Route::get('/cakes/{id}',[Home::class, "cake"])->name('cakes');
Route::get('/cart',[Home::class,"cart"])->name("cart");
Route::post('/add-to-cart/{id}',[Home::class,"add_to_cart"])->name("add_to_cart");
Route::get('/add-to-cart_details/{id}',[Home::class,"add_to_cart_details"])->name("add_to_cart_details");

Route::get('/removeFromCart/{id}',[Home::class,'remove_cart'])->name('removecart');
Route::get('/remove/{id}', [Home::class, 'removeitem'])->name('removeitem');

Route::get('/coupon',[Home::class, "remove_coupon"])->name('coupon.destroy');
Route::post('/cart/apply-coupon', [Home::class,'apply_coupon'])->name('cart.coupon');

Route::get('/checkout', [Home::class, 'checkout'])->name('checkout');
Route::post('/insert_address', [Home::class, 'insert_address'])->name('insert_address');
Route::post('/order',[Home::class,'order'])->name('orderDetail');
Route::get('/place_order/{id}',[Home::class,'place_order'])->name('place_order');
Route::get('/confirm-order',[Home::class,'confirm'])->name('confirm');

Route::get('area/{id}', [Home::class, 'search_area'])->name('area');

Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[Admin::class,'index'])->name('adminDashboard');
    Route::get('/users_detail',[Admin::class,'users'])->name('users_detail');
    Route::get('/profile',[Admin::class,'profile'])->name('profile');
    Route::post('/vendor',[\App\Http\Controllers\Admin::class, "vendor"] )->name('adminvendor')->middleware('auth');
    Route::get('/vendorDetail',[\App\Http\Controllers\Admin::class, "vendorDetail"] )->name('vendorDetail');
    Route::post('/vendordetail',[\App\Http\Controllers\Admin::class, "details"] )->name('vendordetail');
    Route::get('/admincake',[\App\Http\Controllers\Admin::class, "cake"])->name('admincake');
    Route::get('/cakecreate',[\App\Http\Controllers\Admin::class, "create"])->name('cakecreate');
    Route::post('/cakesubmit',[\App\Http\Controllers\Admin::class, "store"])->name('cakesubmit');
    Route::get('/editcake/{id}',[\App\Http\Controllers\Admin::class, "editcake"])->name('editcake');
    Route::put('/updatecake/{id}',[\App\Http\Controllers\Admin::class, "updatecake"])->name('updatecake');
    // delivery boy
    Route::get('/delivery_boy',[\App\Http\Controllers\Admin::class, "staff"])->name('delivery_boy');
    Route::get('/createDeliveryBoy',[\App\Http\Controllers\Admin::class, "createstaff"])->name('createDeliveryBoy');
    Route::post('/submitDeliveryBoy',[\App\Http\Controllers\Admin::class, "submitstaff"])->name('submitDeliveryBoy');
    Route::get('/submitDetailForm',[\App\Http\Controllers\Admin::class, "submitform"])->name('submitDetailForm');
    Route::post('/submitDeliveryBoyDetails',[\App\Http\Controllers\Admin::class, "submitdetails"])->name('submitDeliveryBoyDetails');
    //orders
    Route::get('/order-details',[Admin::class,'orders'])->name('order');
    Route::get('/cancle-order',[Admin::class,'cancle'])->name('cancle');
    Route::get('/order-confirm',[Admin::class,'order_confirm'])->name('order_confirm');
    Route::get('/out_for_delivery',[Admin::class,'out_for_delivery'])->name('out_for_delivery');
    Route::get('/order_completed',[Admin::class,'order_completed'])->name('order_completed');
    Route::get('/assign-vendor/{id}',[Admin::class,'assign_vendor'])->name('assign_vendor');
    Route::post('/submit-vendor/{id}',[Admin::class,'submit_vendor'])->name('submit_vendor');
    Route::get('/cancle_order/{id}',[Admin::class,'cancle_order'])->name('cancle_order');
    Route::get('/show_orders/{id}',[Admin::class,'show_orders'])->name('show_orders');
    Route::get('/personlized',[Admin::class,'personlized'])->name('personlized');


    Route::resource('staffs', DeliveryPersonController::class)->except(['show'])->middleware('auth');
    Route::resource('categories', CategoryController::class)->except(['show'])->middleware('auth');
    Route::resource('cake', CakeController::class)->except(['show'])->middleware('auth');
    Route::resource('coupons', CouponController::class)->middleware('auth');
    Route::resource('countries', CountryController::class)->middleware('auth');
    Route::resource('states', StateController::class)->middleware('auth');
    Route::resource('districts', DistrictController::class)->middleware('auth');
    Route::resource('areas', AreaController::class)->middleware('auth');
    Route::resource('banners', BannerController::class)->except(['show'])->middleware('auth');
    Route::resource('vendors', VendorController::class)->middleware('auth');
    Route::resource('delivery', DeliveryPersonController::class)->middleware('auth');
});

Route::prefix('vendor')->group(function(){
    Route::get('/dashboard',[\App\Http\Controllers\Vendors::class, "index"] )->name('vendorDashboard')->middleware('auth');
    Route::get('/vendor_profile',[Vendors::class,'profile'])->name('vendor_profile');
    Route::get('/details',[\App\Http\Controllers\Vendors::class, "details"])->name('details')->middleware('auth');
    Route::post('/apply',[\App\Http\Controllers\Vendors::class, "apply"])->name('apply');
    // Route::resource('cake', CakeController::class)->except(['create','show','indext'])->middleware('auth');
    // Route::get('/cakes/{id}',[\App\Http\Controllers\Cakes::class, "index"])->name('cake');
    // Route::get('/create/{id}',[\App\Http\Controllers\Cakes::class, "create"])->name('create');
    // Route::post('/submit/{id}',[\App\Http\Controllers\Cakes::class, "store"])->name('submit');

    //delivery boy
    Route::resource('delivery-boy', VendorDelivery::class)->middleware('auth');
    Route::get('/staffs',[\App\Http\Controllers\Vendors::class, "staff"])->name('staff');
    Route::get('/createstaffs',[\App\Http\Controllers\Vendors::class, "createstaff"])->name('createstaff');
    Route::post('/submitstaffs',[\App\Http\Controllers\Vendors::class, "submitstaff"])->name('submitstaff');
    Route::get('/submitform',[\App\Http\Controllers\Vendors::class, "submitform"])->name('submitform');
    Route::post('/submitdetails',[\App\Http\Controllers\Vendors::class, "submitdetails"])->name('submitdetails');
    Route::get('/vendor_show_orders/{id}',[Vendors::class,'show_orders'])->name('vendor_show_orders');
    

    // orders

    Route::get('/orders',[Vendors::class,'order'])->name('vendor_order');
    Route::get('/assign-delivery/{id}',[Vendors::class,'assign_delivery_boy'])->name('assign_delivery_boy');
    Route::post('/submit-delivery/{id}',[Vendors::class,'submit_delivery_boy'])->name('submit_delivery_boy');
    Route::get('/vendor_out_for_delivery',[Vendors::class,'vendor_out_for_delivery'])->name('vendor_out_for_delivery');
    Route::get('/vendor_order_completed',[Vendors::class,'vendor_order_completed'])->name('vendor_order_completed');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
