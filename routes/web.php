<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
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

//Route::view('/home','welcome');
Route::get('/signin', [ClientController::class, "signin"]);
Route::post('/signin', [ClientController::class, "postSignin"]);


Route::get("/signout", [ClientController::class, "signout"]);
Route::get("/signoutExt", [ClientController::class, "sigoutExt"]);

Route::get('/signup', [ClientController::class, "signin"]);
Route::post('/signup', [ClientController::class, "postSignup"]);

Route::get('/update-account', [ClientController::class, "account"]);
Route::post("/update-account", [ClientController::class, "updateAccountDetails"]);

Route::get('/update-password', [ClientController::class, "account"]);
Route::post("/update-password", [ClientController::class, "updateAccountPassword"]);

Route::get('/', [ClientController::class, "home"]);
Route::get('/contact', [ClientController::class, "contact"]);
Route::post('contact', [ClientController::class, 'postContact'])->name('postContact');
Route::get('/product-list', [ClientController::class, "product"]);
Route::get('/wishlist', [ClientController::class, "wishlist"]);
Route::get('/add-wishlist/{id}', [ClientController::class, "addWishlist"]);
Route::get('/delete-wishlist/{id}', [ClientController::class, "deleteWishlist"]);
Route::get('/about', [ClientController::class, "about"]);
Route::get('/my-account', [ClientController::class, "account"]);
Route::get('/order', [ClientController::class, "order"]);
Route::get('/checkout', [ClientController::class, "checkout"]);
Route::get('/check-bill/{id}', [ClientController::class, "checkBill"]);
Route::get('/go-bill', [ClientController::class, "home"]);
Route::post('/go-bill', [ClientController::class, "goBill"]);
Route::post('/update-order', [ClientController::class, "updateOrder"]);
Route::get('/order-details/{id}', [ClientController::class, "orderDetails"]);
Route::get('/product-details/{id}', [ClientController::class, "productDetails"]);
Route::post('/apply-coupon', [ClientController::class, "applyCoupon"]);
Route::post('/submitReview/{id}', [ClientController::class, "submitReview"]);


Route::prefix('admin')->name('admin')->middleware('checkUser')
    ->group(function () {
        //profile
        Route::get('/profile', [UserController::class, 'profile']);
        Route::post('/updateProfile', [UserController::class, 'updatePasswordProfile']);
        //Category
        Route::get('/category', [CategoryController::class, 'home']);
        Route::get('/category/create', [CategoryController::class, 'create']);
        Route::post('/category/postCreate', [CategoryController::class, 'postCreate']);
        Route::get('category/update/{id}', [CategoryController::class, 'update']);
        Route::post('category/postUpdate/{id}', [CategoryController::class, 'postUpdate']);
        Route::get('/category/delete/{id}', [CategoryController::class, 'deleteAll']);

        //Brand
        Route::get('/brand', [BrandController::class, 'home']);
        Route::get('/brand/create', [BrandController::class, 'create']);
        Route::post('/brand/postCreate', [BrandController::class, 'postCreate']);
        Route::get('/brand/update/{id}', [BrandController::class, 'update']);
        Route::post('/brand/postUpdate/{id}', [BrandController::class, 'postUpdate']);
        Route::get('/brand/delete/{id}', [BrandController::class, 'sureDelete']);

        //Tag
        Route::get('/tag', [TagController::class, 'home']);
        Route::get('/tag/create', [TagController::class, 'create']);
        Route::post('/tag/postCreate', [TagController::class, 'postCreate']);
        Route::get('/tag/update/{id}', [TagController::class, 'update']);
        Route::post('/tag/postUpdate/{id}', [TagController::class, 'postUpdate']);

        //Product
        Route::get('product', [AdminProductController::class, 'home']);
        Route::get('product/create', [AdminProductController::class, 'create']);
        Route::post('product/postCreate', [AdminProductController::class, 'postCreate']);
        Route::get('product/update/{id}', [AdminProductController::class, 'update']);
        Route::post('product/postUpdate/{id}', [AdminProductController::class, 'postUpdate']);
        Route::get('product/delete/{id}', [AdminProductController::class, 'delete']);
        Route::get('product/view/{id}', [AdminProductController::class, 'viewDetail']);

        //Images
        Route::get('product/image/{id}', [AdminProductController::class, 'image']);
        Route::get('product/createImage/{id}', [AdminProductController::class, 'createImage']);
        Route::post('product/postCreateImage/{id}', [AdminProductController::class, 'postCreateImage']);
        Route::get('product/updateImage/{id}', [AdminProductController::class, 'updateImage']);
        Route::post('product/postUpdateImage/{id}', [AdminProductController::class, 'postUpdateImage']);
        Route::get('product/deleteImage/{id}', [AdminProductController::class, 'deleteImage']);

        //Reviews
        Route::get('product/review/{id}', [AdminProductController::class, 'review']);
        Route::get('product/deleteReviews/{id}', [AdminProductController::class, 'deleteReview']);

        //Feedback
        Route::get('feedback', [FeedbackController::class, 'home']);
        Route::get('feedback/detail/{id}', [FeedbackController::class, 'detail']);
        Route::get('feedback/delete/{id}', [FeedbackController::class, 'delete']);
        Route::post('feedback/reply', [FeedbackController::class, 'sendMail']);

        //Order
        Route::get('cart', [OrderController::class, 'home']);
        Route::get('cart/detail/{id}', [OrderController::class, 'viewDetail']);
    });













