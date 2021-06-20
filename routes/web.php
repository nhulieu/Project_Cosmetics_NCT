<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\AdminProductController;
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
Route::get('/', [ProductController::class, "index"]);
Route::get('/contact', [ClientController::class, "contact"]);


//Category
Route::get('/category',[CategoryController::class, 'home']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/postCreate',[CategoryController::class, 'postCreate'])->name('createCategory');
Route::get('category/update/{id}', [CategoryController::class, 'update']);
Route::post('category/postUpdate/{id}', [CategoryController::class, 'postUpdate']);
Route::get('/category/delete/{id}',[CategoryController::class, 'deleteAll']);

//Brand
Route::get('/brand',[BrandController::class, 'home']);
Route::get('/brand/create',[BrandController::class, 'create']);
Route::post('/brand/postCreate', [BrandController::class, 'postCreate'])->name('createBrand');
Route::get('/brand/update/{id}', [BrandController::class, 'update']);
Route::post('/brand/postUpdate/{id}',[BrandController::class, 'postUpdate']);

//Tag
Route::get('/tag', [TagController::class, 'home']);
Route::get('/tag/create', [TagController::class, 'create']);
Route::post('/tag/postCreate', [TagController::class, 'postCreate'])->name('createTag');
Route::get('/tag/update/{id}', [TagController::class, 'update']);
Route::post('/tag/postUpdate/{id}',[TagController::class, 'postUpdate']);

//Product
Route::get('product/home', [AdminProductController::class, 'home']);
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

//Order
