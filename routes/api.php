<?php

use App\Http\Controllers\Api\RegisterLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use GuzzleHttp\Promise\Create;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    // api


});


Route::post('/registerUser', [RegisterLoginController::class, 'storeUser']);

Route::post('/login', [ApiController::class, 'login']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/changepassword', [ApiController::class, 'changepassword']);
Route::post('/forgotpassword', [ApiController::class, 'forgotpassword']);
Route::post('/checkotp', [ApiController::class, 'checkotp']);
Route::post('/updatepassword', [ApiController::class, 'updatepassword']);
// Front End Api

// view
Route::get('front/address/{user_id}', [ApiController::class, 'addressview']);
Route::get('front/checkout/{id}', [ApiController::class, 'checkoutview']);
Route::get('front/cart/{user_id}', [ApiController::class, 'cartview']);
Route::get('front/wishlist/{id}', [ApiController::class, 'wishlistview']);
Route::get('front/wishlistpro/{id}', [ApiController::class, 'wishlistrpoductvise']);
Route::get('front/profile/{id}', [ApiController::class, 'profileview']);
Route::get('front/productdetail/{id?}', [ApiController::class, 'productdetailview']);
Route::get('front/productfilter', [ApiController::class, 'productfilter']);
Route::get('front/order/{user_id}', [ApiController::class, 'orderview']);

// Create
Route::post('/front/address', [ApiController::class, 'addressstore']);
Route::post('/front/addtocart', [ApiController::class, 'addtocartstore']);
Route::post('/front/wishlist', [ApiController::class, 'wishliststore']);
Route::post('/front/contactus', [ApiController::class, 'contactusstore']);
Route::post('/front/review', [ApiController::class, 'reviewstore']);


// delete
Route::delete('/front/cartdelete/{id}', [ApiController::class, 'cartdelete']);
Route::delete('/front/wishlistdelete/{id}', [ApiController::class, 'wishlistdelete']);
Route::delete('/front/addressdelete/{id}', [ApiController::class, 'addressdelete']);

// update
Route::put('/front/addressedit/{id}', [ApiController::class, 'addressedit']);





//extra
// Back End Api
Route::get('/back/product/cat/{id?}', [ApiController::class, 'productviewcat']);
Route::get('/back/category/{id?}', [ApiController::class, 'categoryview']);
Route::get('/back/coupon/{id?}', [ApiController::class, 'couponview']);
Route::get('/back/currency/{id?}', [ApiController::class, 'currencyview']);
Route::get('/back/discountable/{id?}', [ApiController::class, 'discountableview']);
Route::get('/back/field/{id?}', [ApiController::class, 'fieldview']);
Route::get('/back/market/{id?}', [ApiController::class, 'marketview']);
Route::get('/back/option/{id?}', [ApiController::class, 'optionview']);
Route::get('/back/optiongroup/{id?}', [ApiController::class, 'optiongroupview']);
Route::get('/back/productgallery/{id?}', [ApiController::class, 'productgalleryview']);
Route::get('/back/slide/{id?}', [ApiController::class, 'slideview']);
Route::get('/back/users/{id?}', [ApiController::class, 'usersview']);
Route::get('/back/vouchardetail/{id?}', [ApiController::class, 'vouchardetailview']);
Route::get('/back/voucharmaster/{id?}', [ApiController::class, 'voucharmasterview']);