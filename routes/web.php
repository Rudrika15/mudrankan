<?php

use Illuminate\Support\Facades\Route;
// front end controller imports starts

use App\Http\Controllers\Front_end\HomeController;

// front end controller imports ends 

//back end controllers imports starts
use App\Http\Controllers\back_end\CategoryController;
use App\Http\Controllers\back_end\ProductController;
use App\Http\Controllers\back_end\OptionController;
use App\Http\Controllers\back_end\OptiongroupController;
use App\Http\Controllers\back_end\ProductgalleryController;
use App\Http\Controllers\back_end\MarketController;
use App\Http\Controllers\back_end\FieldController;
use App\Http\Controllers\back_end\SlideController;
use App\Http\Controllers\back_end\CurrencyController;
use App\Http\Controllers\back_end\CouponController;
use App\Http\Controllers\back_end\VoucharmasterController;
use App\Http\Controllers\back_end\RolesController;
use App\Http\Controllers\back_end\PermissionsController;
use App\Http\Controllers\back_end\LoginController;
use App\Http\Controllers\back_end\RegisterController;
use App\Http\Controllers\back_end\UsersController;
use App\Http\Controllers\back_end\LogoutController;
use App\Http\Controllers\back_end\HomeeController;
use App\Http\Controllers\back_end\ChannelController;
use App\Http\Controllers\RazorpayPaymentController;

//back end controllers importing stop 



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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, "index"])->name("front_end.index");
Route::get('/about', [HomeController::class, "about"])->name("front_end.about");
Route::get('/products/{id?}', [HomeController::class, "products"])->name("front_end.products");
Route::get('/products/detail/{id}', [HomeController::class, "productsdetails"])->name("front_end.products_details");
Route::get('/homedecors', [HomeController::class, "homedecors"])->name("front_end.homedecors");
Route::get('/craft', [HomeController::class, "craft"])->name("front_end.craft");
Route::get('/category/{id?}', [HomeController::class, "category"])->name("front_end.category");
Route::get('/stationery', [HomeController::class, "stationery"])->name("front_end.stationery");
Route::post('/cartcode/{id}', [HomeController::class, "cartcode"])->name("front_end.cartcode");
Route::post('/wishlistcode', [HomeController::class, "wishlistcode"])->name("front_end.wishlistcode");
Route::get('/myaccount', [HomeController::class, "myaccount"])->name("front_end.myaccount");
Route::get('/wishlist', [HomeController::class, "wishlist"])->name("front_end.wishlist");
// Route::post('/store_wishlist', [HomeController::class, "store_wishlist"])->name("front_end.store_wishlist");
Route::post('/registercode', [HomeController::class, "registercode"])->name("front_end.registercode");
Route::post('/logincode', [HomeController::class, "logincode"])->name("front_end.logincode");
Route::post('/logincodee', [HomeController::class, "logincodee"])->name("front_end.logincodee");
Route::get('/vouchar', [HomeController::class, "vouchar"])->name("front_end.vouchar");
Route::get('/vouchar/detail/{id}', [HomeController::class, "vouchardetail"])->name("front_end.vouchar_detail");
Route::post('/voucharsave', [HomeController::class, "voucharsave"])->name("front_end.voucharsave");
// Route::get('/viewvoucharcart', [HomeController::class, "viewcart"])->name("front_end.viewcart");
Route::post('/check-vouchar-price', [HomeController::class, 'checkPrice'])->name('check.vouchar.price');
Route::post('/payment-complete', [HomeController::class, 'paymentComplete'])->name('payment.complete');
Route::post('/save-voucher', [HomeController::class, 'saveVouchar'])->name('save.vouchar');

//forgot password
Route::get('forget-password', [HomeController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [HomeController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [HomeController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [HomeController::class, 'submitResetPasswordForm'])->name('reset.password.post');



Route::get('/logout', [HomeController::class, "logout"])->name("front_end.logout");
Route::post('/cart', [HomeController::class, "cart"])->name("front_end.cart");
Route::get('/viewcart', [HomeController::class, "viewcart"])->name("front_end.viewcart");
Route::delete('/remove_from_cart', [HomeController::class, "cartdelete"])->name("front_end.remove_from_cart");
Route::get('/wishlistdelete/{id}', [HomeController::class, "wishlistdelete"])->name("front_end.wishlistdelete");
Route::get('/register', [HomeController::class, "register"])->name("front_end.register");
Route::post('/review', [HomeController::class, "review"])->name("front_end.review");
Route::post('/ask_question', [HomeController::class, "ask_question"])->name("front_end.ask_question");
Route::get('/myprofile/{id}',[HomeController::class,"myprofile"])->name('front_end.myprofile');
Route::post('/myprofileu/update/{id}',[HomeController::class,"myprofileupdate"])->name('front_end.myprofileupdate');


// checkout
Route::get('/checkout', [HomeController::class, "checkout"])->name("front_end.checkout");
Route::post('/checkoutcode', [HomeController::class, "checkoutcode"])->name("front_end.checkoutcode");

// contact us
Route::get('/contactus', [HomeController::class, "contactus"])->name("front_end.contactus");
Route::post('/contactuscode', [HomeController::class, "contactuscode"])->name("front_end.contactuscode");

// address
Route::get('/address', [HomeController::class, "address"])->name("front_end.address");
Route::post('/addresscode', [HomeController::class, "addresscode"])->name("front_end.addresscode");
Route::get('/addressdelete/{id}', [HomeController::class, "addressdelete"])->name("front_end.addressdelete");
Route::get('/address/{id}/edit', [HomeController::class, 'addressedit'])->name('front_end.addressedit');
Route::post("address/{id}", [HomeController::class, 'addressupdate'])->name('front_end.addressupdate');
Route::get('/get-states/{countryId}', [HomeController::class, "getstates"])->name("front_end.getstates");
Route::get('/get-cities/{stateId}', [HomeController::class, "getcities"])->name("front_end.getcities");

//payment

Route::get('payment', [RazorpayPaymentController::class, 'index']);
Route::post('payment/store', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
Route::post('apply/discount', [HomeController::class, 'applyDiscount'])->name('apply.discount');

// footer
Route::get('/privacy-policy', function () {
  return view('Front_end.Layouts.privacypolicy');
})->name('privacy.policy');

Route::get('/terms_conditions', function () {
  return view('Front_end.Layouts.terms_conditions');
})->name('terms.conditions');

Route::get('/disclaimer', function () {
  return view('Front_end.Layouts.disclaimer');
})->name('disclaimer');

Route::get('/corporate_gifting', function () {
  return view('Front_end.Layouts.corporate_gifting');
})->name('corporate.gifting');

Route::get('/shipping-policy', function () {
  return view('Front_end.Layouts.shipping_policy');
})->name('shipping.policy');

Route::get('/refund-policy', function () {
  return view('Front_end.Layouts.refund_policy');
})->name('refund.policy');

Route::get('/Terms-of-service', function () {
  return view('Front_end.Layouts.terms_of_service');
})->name('terms.of.service');







//  backend routes starting


// Route::get('/', function () {
//   return view('home');
// });


Route::get('/backend/home/{id?}', [HomeeController::class, 'index'])->name('home.index');

// Route::group(['/backend/middleware' => ['guest']], function () {

//   //register routes
//   Route::get('/backend/register', [RegisterController::class, 'show'])->name('register.show');
//   Route::post('/backend/register', [RegisterController::class, 'register'])->name('register.perform');


//   // Login Routes

//   Route::get('/backend/login', [LoginController::class, 'show'])->name('login.show');
//   Route::post('/backend/login', [LoginController::class, 'login'])->name('login.perform');
// });

Route::group(['middleware' => 'auth'], function () {
  
//logout
Route::get('/backend/logout', [LogoutController::class, 'logout'])->name('logout');


Route::group(['/backend/middleware' => ['auth', 'permission']], function () {

  //users
  Route::get('/backend/users/show/{user}', [UsersController::class, 'show'])->name('users.show');
  Route::get('/backend/users/index', [UsersController::class, 'index'])->name('users.index');
  Route::get('/backend/users/create', [UsersController::class, 'create'])->name('users.create');
  Route::get('/backend/users/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
  Route::post('/backend/users/code', [UsersController::class, 'store'])->name('users.code');
  Route::get("/backend/users/destroy/{user}", [UsersController::class, "destroy"])->name('users.destroy');
  Route::post("/backend/users/update/{id}", [UsersController::class, "update"])->name('users.update');
  Route::post("/backend/users/assignrole", [UsersController::class, "assignRole"])->name('users.assignrole');
  Route::post("/backend/users/removerole", [UsersController::class, "removeRole"])->name('users.removerole');

  // Route::get('/backend//create', 'UsersController@create')->name('users.create');
  //   Route::post('/backend//create', 'UsersController@store')->name('users.store');
  //   Route::get('/backend//{user}/show', 'UsersController@show')->name('users.show');
  //   Route::get('/backend//{user}/edit', 'UsersController@edit')->name('users.edit');
  //   Route::patch('/backend//{user}/update', 'UsersController@update')->name('users.update');
  //   Route::delete('/backend//{user}/delete', 'UsersController@destroy')->name('users.destroy');


  //roles and permission

  Route::resource('/backend/roles', RolesController::class);
  Route::resource('/backend/permissions', PermissionsController::class);

  // Roles Routes
  Route::get('/backend/roles', [RolesController::class, 'index'])->name('roles.index');
  Route::get('/backend/roles/create', [RolesController::class, 'create'])->name('roles.create');
  Route::get('/backend/roles/show/{role}', [RolesController::class, 'show'])->name('roles.show');
  Route::post('/backend/roles', [RolesController::class, 'store'])->name('roles.store');
  Route::get('/backend/roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
  Route::post('/backend/roles/{role}', [RolesController::class, 'update'])->name('roles.update');
  Route::get('/backend/roles/{role}', [RolesController::class, 'destroy'])->name('roles.destroy');
  
  // Permissions Routes
  Route::get('/backend/permissions', [PermissionsController::class, 'index'])->name('permissions.index');
  Route::get('/backend/permissions/create', [PermissionsController::class, 'create'])->name('permissions.create');
  Route::get('/backend/permissions/show/{permission}', [PermissionsController::class, 'show'])->name('permissions.show');
  Route::post('/backend/permissions', [PermissionsController::class, 'store'])->name('permissions.store');
  Route::get('/backend/permissions/{permission}/edit', [PermissionsController::class, 'edit'])->name('permissions.edit');
  Route::post('/backend/permissions/{permission}', [PermissionsController::class, 'update'])->name('permissions.update');
  Route::get('/backend/permissions/{permission}', [PermissionsController::class, 'destroy'])->name('permissions.destroy');
  
});




// category

Route::get('/backend/category/show', [CategoryController::class, 'index'])->name('category.show');
Route::get('/backend/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/backend/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/backend/category/code', [CategoryController::class, 'category_code'])->name('category.code');
Route::get("/backend/category/delete/{id}", [CategoryController::class, "catdelete"])->name('category.delete');
Route::post("/backend/category/edit_code", [CategoryController::class, "edit_code"])->name('category.edit_code');
//end category

// channel

Route::get('/backend/channel/show', [ChannelController::class, 'index'])->name('channel.show');
Route::get('/backend/channel/create', [ChannelController::class, 'create'])->name('channel.create');
Route::get('/backend/channel/edit/{id}', [ChannelController::class, 'edit'])->name('channel.edit');
Route::post('/backend/channel/code', [ChannelController::class, 'channel_code'])->name('channel.code');
Route::get("/backend/channel/delete/{id}", [ChannelController::class, "channeldelete"])->name('channel.delete');
Route::post("/backend/channel/edit_code", [ChannelController::class, "edit_code"])->name('channel.edit_code');
//end channel



//product
Route::get('/backend/product/show', [ProductController::class, 'index'])->name('product.show');
Route::get('/backend/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/backend/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/backend/product/code', [ProductController::class, 'product_code'])->name('product.code');
Route::get("/backend/product/delete/{id}", [ProductController::class, "prodelete"])->name('product.delete');
Route::post("/backend/product/edit_code", [ProductController::class, "edit_code"])->name('product.edit_code');

//end product

//option
Route::get('/backend/option/show', [OptionController::class, 'index'])->name('option.show');
Route::get('/backend/option/create', [OptionController::class, 'create'])->name('option.create');
Route::get('/backend/option/edit/{id}', [OptionController::class, 'edit'])->name('option.edit');
Route::post('/backend/option/code', [OptionController::class, 'option_code'])->name('option.code');
Route::get("/backend/option/delete/{id}", [OptionController::class, "optiondelete"])->name('option.delete');
Route::post("/backend/option/edit_code", [OptionController::class, "edit_code"])->name('option.edit_code');


//end option

// option group
Route::get('/backend/optiongroup/show', [OptiongroupController::class, 'index'])->name('optiongroup.show');
Route::get('/backend/optiongroup/create', [OptiongroupController::class, 'create'])->name('optiongroup.create');
Route::get('/backend/optiongroup/edit/{id}', [OptiongroupController::class, 'edit'])->name('optiongroup.edit');
Route::post('/backend/optiongroup/code', [OptiongroupController::class, 'optiongroup_code'])->name('optiongroup.code');
Route::get("/backend/optiongroup/delete/{id}", [OptiongroupController::class, "optiongroupdelete"])->name('optiongroup.delete');
Route::post("/backend/optiongroup/edit_code", [OptiongroupController::class, "edit_code"])->name('optiongroup.edit_code');


//end option group

//Product gallery
Route::get('/backend/productgallery/show', [ProductgalleryController::class, 'index'])->name('productgallery.show');
Route::get('/backend/productgallery/create', [ProductgalleryController::class, 'create'])->name('productgallery.create');
Route::get('/backend/productgallery/edit/{id}', [ProductgalleryController::class, 'edit'])->name('productgallery.edit');
Route::post('/backend/productgallery/code', [ProductgalleryController::class, 'productgallery_code'])->name('productgallery.code');
Route::get("/backend/productgallery/delete/{id}", [ProductgalleryController::class, "progallerydelete"])->name('productgallery.delete');
Route::post("/backend/productgallery/edit_code", [ProductgalleryController::class, "edit_code"])->name('productgallery.edit_code');

//end Product gallery


// market
Route::get('/backend/market/show', [MarketController::class, 'index'])->name('market.show');
Route::get('/backend/market/create', [MarketController::class, 'create'])->name('market.create');
Route::get('/backend/market/edit/{id}', [MarketController::class, 'edit'])->name('market.edit');
Route::post('/backend/market/code', [MarketController::class, 'market_code'])->name('market.code');
Route::get("/backend/market/delete/{id}", [MarketController::class, "marketdelete"])->name('market.delete');
Route::post("/backend/market/edit_code", [MarketController::class, "edit_code"])->name('market.edit_code');

// end market

// field
Route::get('/backend/field/show', [FieldController::class, 'index'])->name('field.show');
Route::get('/backend/field/create', [FieldController::class, 'create'])->name('field.create');
Route::get('/backend/field/edit/{id}', [FieldController::class, 'edit'])->name('field.edit');
Route::post('/backend/field/code', [FieldController::class, 'field_code'])->name('field.code');
Route::get("/backend/field/delete/{id}", [FieldController::class, "fielddelete"])->name('field.delete');
Route::post("/backend/field/edit_code", [FieldController::class, "edit_code"])->name('field.edit_code');

// end field


//slides
Route::get('/backend/slide/show', [SlideController::class, 'index'])->name('slide.show');
Route::get('/backend/slide/create', [SlideController::class, 'create'])->name('slide.create');
Route::get('/backend/slide/edit/{id}', [SlideController::class, 'edit'])->name('slide.edit');
Route::post('/backend/slide/code', [SlideController::class, 'slide_code'])->name('slide.code');
Route::get("/backend/slide/delete/{id}", [SlideController::class, "slidedelete"])->name('slide.delete');
Route::post("/backend/slide/edit_code", [SlideController::class, "edit_code"])->name('slide.edit_code');

//end slide

// currency

Route::get('/backend/currency/show', [CurrencyController::class, 'index'])->name('currency.show');
Route::get('/backend/currency/create', [CurrencyController::class, 'create'])->name('currency.create');
Route::get('/backend/currency/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit');
Route::post('/backend/currency/code', [CurrencyController::class, 'currency_code'])->name('currency.code');
Route::get("/backend/currency/delete/{id}", [CurrencyController::class, "currencydelete"])->name('currency.delete');
Route::post("/backend/currency/edit_code", [CurrencyController::class, "edit_code"])->name('currency.edit_code');

// end currency



//coupon
Route::get('/backend/coupon/show', [CouponController::class, 'index'])->name('coupon.show');
Route::get('/backend/coupon/create', [CouponController::class, 'create'])->name('coupon.create');
Route::get('/backend/coupon/edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
Route::post('/backend/coupon/code', [CouponController::class, 'coupon_code'])->name('coupon.code');
Route::get("/backend/coupon/delete/{id}", [CouponController::class, "coupondelete"])->name('coupon.delete');
Route::post("/backend/coupon/edit_code", [CouponController::class, "edit_code"])->name('coupon.edit_code');



//end coupon


//vouchar master
Route::get('/backend/voucharmaster/show', [VoucharmasterController::class, 'index'])->name('voucharmaster.show');
Route::get('/backend/voucharmaster/create', [VoucharmasterController::class, 'create'])->name('voucharmaster.create');
Route::get('/backend/voucharmaster/edit/{id}', [VoucharmasterController::class, 'edit'])->name('voucharmaster.edit');
Route::post('/backend/voucharmaster/code', [VoucharmasterController::class, 'voucharmaster_code'])->name('voucharmaster.code');
Route::get("/backend/voucharmaster/delete/{id}", [VoucharmasterController::class, "voucharmasterdelete"])->name('voucharmaster.delete');
Route::post("/backend/voucharmaster/edit_code", [VoucharmasterController::class, "edit_code"])->name('voucharmaster.edit_code');



//end vouchar master
});