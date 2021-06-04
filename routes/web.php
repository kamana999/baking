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
use App\Http\Controllers\Coupons;

use App\Http\Controllers\Admin;

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
Route::get('/category/{id}',[Home::class, "fillter"])->name('category');
Route::get('/cakes/{id}',[Home::class, "cake"])->name('cakes');
Route::get('/cart',[Home::class,"cart"])->name("cart");
Route::get('/add-to-cart/{id}',[Home::class,"add_to_cart"])->name("add_to_cart");

Route::get('/removeFromCart/{id}',[Home::class,'remove_cart'])->name('removecart');
Route::get('/remove/{id}', [Home::class, 'removeitem'])->name('removeitem');

Route::get('/coupon',[Home::class, "remove_coupon"])->name('coupon.destroy');
Route::post('/cart/apply-coupon', [Home::class,'apply_coupon'])->name('cart.coupon')->middleware('auth');

Route::get('/checkout', [Home::class, 'checkout'])->name('checkout');
Route::post('/insert_address', [Home::class, 'insert_address'])->name('insert_address');
Route::post('/order',[Home::class,'order'])->name('orderDetail');
Route::get('/confirm-order',[Home::class,'confirm'])->name('confirm');

Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[Admin::class,'index'])->name('adminDashboard');
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
    Route::get('/assign-delivery/{id}',[Admin::class,'assign_delivery_boy'])->name('assign_delivery_boy');
    Route::post('/submit-delivery/{id}',[Admin::class,'submit_delivery_boy'])->name('submit_delivery_boy');
    Route::get('/cancle_order/{id}',[Admin::class,'cancle_order'])->name('cancle_order');

    Route::resource('staffs', DeliveryPersonController::class)->except(['show'])->middleware('auth');
    Route::resource('categories', CategoryController::class)->except(['show'])->middleware('auth');
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
    Route::get('/details',[\App\Http\Controllers\Vendors::class, "details"])->name('details')->middleware('auth');
    Route::post('/apply',[\App\Http\Controllers\Vendors::class, "apply"])->name('apply');
    Route::resource('cake', CakeController::class)->except(['create','show','indext'])->middleware('auth');
    // Route::get('/cakes/{id}',[\App\Http\Controllers\Cakes::class, "index"])->name('cake');
    // Route::get('/create/{id}',[\App\Http\Controllers\Cakes::class, "create"])->name('create');
    // Route::post('/submit/{id}',[\App\Http\Controllers\Cakes::class, "store"])->name('submit');
//delivery boy
    Route::get('/staffs/{id}',[\App\Http\Controllers\Admin::class, "staff"])->name('staff');
    Route::get('/createstaffs',[\App\Http\Controllers\Admin::class, "createstaff"])->name('createstaff');
    Route::post('/submitstaffs',[\App\Http\Controllers\Admin::class, "submitstaff"])->name('submitstaff');
    Route::get('/submitform',[\App\Http\Controllers\Admin::class, "submitform"])->name('submitform');
    Route::post('/submitdetails/{id}',[\App\Http\Controllers\Admin::class, "submitdetails"])->name('submitdetails');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
