<?php

use App\Http\Controllers\{SslCommerzPaymentController, CouponController, AttributesController, FrontendController,DashboardController,ProfileController,UserController, CategoryController, ProductController};
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Auth;

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

// FrontendController Route
route::get('register', [FrontendController::class, 'register'])->name('register');
route::get('/', [FrontendController::class,  'index'])->name('/');
route::get('cart_row_delete', [FrontendController::class,  'cart_row_delete'])->name('cart.row.delete');
route::get('shop', [FrontendController::class,  'shop'])->name('shop');
route::get('contact', [FrontendController::class, 'contact'])->name('contact');
route::post('contact', [FrontendController::class, 'contact_message'])->name('contact.message');
route::get('account', [FrontendController::class, 'account'])->name('account')->middleware(['auth', 'verified']);
route::get('single_page/{id}', [FrontendController::class, 'single_page'])->name('single.page');
route::get('cart', [FrontendController::class, 'cart'])->name('cart');
route::get('cart_delete/{id}', [FrontendController::class, 'cart_row_delete'])->name('cart.row.delete');
route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
route::post('checkout', [FrontendController::class, 'get_city']);
route::post('payment-post', [FrontendController::class, 'payment_post'])->name('payment_post');



// route::get('team', [FrontendController::class, 'team']);
// route::post('team/insert', [FrontendController::class, 'teaminsert']);
// route::get('team/delete/{id}', [FrontendController::class, 'teamdelete']);
// route::get('team/edit/{id}', [FrontendController::class, 'teamedit']);
// route::post('team/edit/{id}', [FrontendController::class, 'teamedit']);
// route::get('team/trash/{id}', [FrontendController::class, 'teamtrash']);
// route::get('team/trash/delete/{id}', [FrontendController::class, 'teamtrashdelete']);

Auth::routes();

// DashboardController Route
Route::get('home', [DashboardController::class, 'home'])->name('home');
Route::get('members', [DashboardController::class, 'members']);
Route::post('add-admin', [DashboardController::class, 'add_admin_post'])->name('add_admin_post');


// ProfileController Route
Route::get('/profile', [ProfileController::class, 'profile']);
Route::post('profile/upload', [ProfileController::class, 'profileupload']);
Route::post('profile/change_password', [ProfileController::class, 'change_password']);
Route::get('phone/verification', [ProfileController::class, 'phone_verification']);
Route::post('check/code', [ProfileController::class, 'check_code']);

//UserController Route
route::get('customer-registation', [UserController::class, 'customer_register'])->name('customer_register');
route::post('customer-registation', [UserController::class, 'customer_register_post'])->name('customer_register_post');
route::post('customer-login', [UserController::class, 'customer_login_post'])->name('customer_login_post');

route::get('vendor-registation', [UserController::class, 'vendor_register'])->name('vendor_register');
route::post('vendor-registation', [UserController::class, 'vendor_register_post'])->name('vendor_register_post');
route::get('vendor-login', [UserController::class, 'vendor_login'])->name('vendor_login');
route::post('vendor-login', [UserController::class, 'vendor_login_post'])->name('vendor_login_post');


//Email Verification Route

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//Product Routes
Route::resource('product', ProductController::class);
Route::get('product/inventory/{product}', [ProductController::class, 'inventory'])->name('product.inventory');

//Attributes Routes
Route::resource('attributes', AttributesController::class);

//Coupon Routes
Route::resource('coupon', CouponController::class);



// Middleware Gruop Routes

Route::middleware(['ForAdmin'])->group(function (){
    // DashboardController Route
    Route::get('add-admin', [DashboardController::class, 'add_admin'])->name('add_admin')->middleware('ForAdmin');
    Route::get('admin-list', [DashboardController::class, 'admin_list'])->name('admin_list')->middleware('ForAdmin');
    Route::get('vendor-list', [DashboardController::class, 'vendor_list'])->name('vendor_list')->middleware('ForAdmin');
    Route::post('vendor-status/chnage/{id}', [DashboardController::class, 'vendor_status'])->name('vendor_status')->middleware('ForAdmin');

    //CategoryConroller Route
    Route::resource('category', CategoryController::class)->middleware('ForAdmin');
});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
