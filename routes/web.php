<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/account', 'App\Http\Controllers\MyAccountController@myAccount')->name('account')->middleware('auth');

Route::get('/cart', 'App\Http\Controllers\CartController@showCart')->name('cart');

Route::get('/change-cart', 'App\Http\Controllers\CartController@changeCart')->name('change-cart');

Route::post('/check-email', 'App\Http\Controllers\MyAccountController@checkEmail')->name('check.email');

Route::put('/update-profile', 'App\Http\Controllers\MyAccountController@updateProfile')->name('update-profile')->middleware('auth');

Route::put('/updateProfileAddress', 'App\Http\Controllers\MyAccountController@updateProfileAddress')->name('updateProfileAddress')->middleware('auth');

Route::put('/updateProfilePassword', 'App\Http\Controllers\MyAccountController@updateProfilePassword')->name('updateProfilePassword')->middleware('auth');

Route::get('/add-to-cart', 'App\Http\Controllers\CartController@addtoCart')->name('add-to-cart');

Route::get('/decreaseQty', 'App\Http\Controllers\CartController@decreaseQty')->name('decreaseQty');

Route::get('/remove-frm-cart', 'App\Http\Controllers\CartController@removeFromCart')->name('remove-frm-cart');

Route::get('/store-in-session', 'App\Http\Controllers\SessionController@storeInSession')->name('store-in-session');

Route::post('/store-in-session', 'App\Http\Controllers\SessionController@storeInSession')->name('store-in-session');

Route::get('/update-session/{item}/{quantityChange}', 'App\Http\Controllers\SessionController@updateSession')->name('update-session');

Route::get('/get-google-maps-api-key', function () {
    return config('services.google_maps.api_key');
});

Route::post('/contact', 'App\Http\Controllers\ContactController@sendEmail')->name('contact.send');

Route::get('/place-order/{payment_method}', 'App\Http\Controllers\OrderController@placeOrder')->name('place-order');

Route::get('/summaryPage', 'App\Http\Controllers\CartController@summaryPage')->name('summaryPage')->middleware('auth');

Route::get('/my-orders', 'App\Http\Controllers\OrderController@myOrders')->name('my-orders')->middleware('auth');

Route::get('/order-details/{order_id}', 'App\Http\Controllers\OrderController@orderDetails')->name('order-details')->middleware('auth');

Route::get('/profile', function () { return view('profile');})->name('profile')->middleware('auth');

Route::get('/zones', 'App\Http\Controllers\ZoneController@fetchZones');

Route::get('/edit-order/{order_id}', 'App\Http\Controllers\OrderController@editOrder')->name('edit-order');

Route::post('/update-order/{order_id}', 'App\Http\Controllers\OrderController@updateOrder')->name('update-order');
//show pending payment page
Route::get('/payment-options', 'App\Http\Controllers\PaymentController@paymentOptions')->name('payment-options')->middleware('auth');
//update payment method
Route::get('/payment-options-update/{order_id}', 'App\Http\Controllers\PaymentController@paymentOptionsUpdate')->name('payment-options-update')->middleware('auth');
// process payemnt method and show thankyou page other than online orders
Route::get('/payment-finalize/{order_id}', 'App\Http\Controllers\PaymentController@paymentFinalize')->name('payment-finalize')->middleware('auth');
// online payment generation webinit
Route::get('/payment/{order_id}', 'App\Http\Controllers\PaymentController@generatePaymentPageTest')->name('payment-process')->middleware('auth');

Route::get('/payment-dijon/{order_id}', 'App\Http\Controllers\PaymentController@generatePaymentPageDijon')->name('payment-process-dijon')->middleware('auth');

Route::get('/payment-belfort/{order_id}', 'App\Http\Controllers\PaymentController@generatePaymentPageBelfort')->name('payment-process-belfort')->middleware('auth');

Route::get('/payment-besancon/{order_id}', 'App\Http\Controllers\PaymentController@generatePaymentPageBesancon')->name('payment-process-besancon')->middleware('auth');


//handle responses from lcl payments
Route::post('/payment-success-dijon', 'App\Http\Controllers\PaymentController@handlePaymentResponseDijon')->name('payment-success-dijon');

Route::post('/payment-success-test', 'App\Http\Controllers\PaymentController@handlePaymentResponseTest')->name('payment-success-test');

Route::post('/payment-success-belfort', 'App\Http\Controllers\PaymentController@handlePaymentResponseBelfort')->name('payment-success-belfort');

Route::post('/payment-success-besancon', 'App\Http\Controllers\PaymentController@handlePaymentResponseBesancon')->name('payment-success-besancon');

Route::post('/check-delivery-zone', 'App\Http\Controllers\DeliveryZoneController@checkDeliveryZone');

Route::get('/change-method/{order_id}', 'App\Http\Controllers\CartController@changeMethod')->name('change-method');

//pages

route::get('/cgv', function () { return view('pages.cgv'); })->name('cgv');

route::get('/contact', function () { return view('pages.contact'); })->name('contact');

route::get('/donnees-personnelles', function () { return view('pages.donness'); })->name('donnees-personnelles');

route::get('/loyaute', function () { return view('pages.loyaute'); })->name('loyaute');

route::get('/mentions-legales', function () { return view('pages.mentions'); })->name('mentions-legales');

route::get('/nos-restaurants', function () { return view('pages.nosrestaurents'); })->name('nos-restaurants');

route::get('/recrutment', function () { return view('pages.recrutment'); })->name('recrutment');

route::get('/sushi-experience', function () { return view('pages.sushiexp'); })->name('sushi-experience');

// menu routes

Route::get('/menu', [MenuController::class, 'allCategories'])->name('menu');

Route::get('/menu/{category}', [MenuController::class, 'subcategories'])->name('menu.subcategories');

Route::get('/menu/{category}/{subcategory}', [MenuController::class, 'products'])->name('menu.products');

Route::get('/menu/{category}/{subcategory}/{product}', [MenuController::class, 'productDetails'])->name('menu.productDetails');



Route::post('/register-guest', 'App\Http\Controllers\Auth\RegisterController@registerGuest')->name('register-guest');

Route::get('/customer-login', function () { return view('auth.customer-login'); })->name('customer-login');

Route::get('/admin/login', 'App\Http\Controllers\admin\AdminController@login')->name('admin.login');


//admin
Route::middleware(['auth', 'checkUserRole'])->group(function () {
Route::prefix('admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\admin\AdminController@index')->name('admin.dashboard');
    
    // Add other admin routes here
    Route::get('/products', 'App\Http\Controllers\admin\AdminController@products')->name('admin.products.index');
    Route::get('edit-product/{id}', 'App\Http\Controllers\admin\ProductController@edit')->name('admin.edit-product');
    Route::put('update-product/{id}', 'App\Http\Controllers\admin\ProductController@update')->name('admin.products.update');
        
    Route::get('/orders', 'App\Http\Controllers\admin\OrderController@index')->name('admin.orders');

    Route::get('/orders-delivery', 'App\Http\Controllers\admin\OrderController@indexDelivery')->name('admin.orders.delivery');

    Route::get('/orders/{id}', 'App\Http\Controllers\admin\OrderController@show')->name('orders.show');

    Route::get('/users', 'App\Http\Controllers\admin\UserController@index')->name('admin.users');

    Route::get('/users/create', 'App\Http\Controllers\admin\UserController@createUser')->name('admin.users.create');

    Route::post('/users/create', 'App\Http\Controllers\admin\UserController@postCreateUser')->name('admin.users.create.post');

    Route::get('/users/{id}', 'App\Http\Controllers\admin\UserController@show')->name('admin.users.show');

    Route::get('/users/{id}/edit', 'App\Http\Controllers\admin\UserController@edit')->name('admin.users.edit');

    Route::put('/users/{id}', 'App\Http\Controllers\admin\UserController@update')->name('admin.users.update');

    Route::get('/users/{id}/delete', 'App\Http\Controllers\admin\UserController@destroy')->name('admin.users.delete');

    Route::delete('/products/options/{id}', 'App\Http\Controllers\admin\ProductController@deleteOption');

    Route::get('/update-orders', 'App\Http\Controllers\admin\OrderController@updateOrders')->name('update-orders');

  
});
});
