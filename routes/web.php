<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::prefix('home')->group(function (){
    Route::get('login',[LoginController::class,'index'])->name('home.showLogin');
    Route::post('login',[LoginController::class,'login'])->name('home.login');
    Route::get('register',[RegisterController::class,'create'])->name('register.index');
    Route::post('register',[RegisterController::class,'store'])->name('register.store');
    Route::get('index',[FoodsController::class,'index'])->name('home.index');
    Route::get('create',[FoodsController::class,'create'])->name('home.create');
    Route::post('create',[FoodsController::class,'store'])->name('home.store');
    Route::get('{id}/edit',[FoodsController::class,'edit'])->name('home.edit');
    Route::post('{id}/update',[FoodsController::class,'update'])->name('home.update');
    Route::get('{id}/delete',[FoodsController::class,'delete'])->name('home.delete');
    Route::get('showFood',[FoodsController::class,'showAllFood'])->name('home.showAllFood');
    Route::get('/search',[FoodsController::class,'search'])->name('home.search');
    Route::prefix('category')->group(function (){
        Route::get('/',[CategoryController::class,'index'])->name('category.index');
        Route::get('create',[CategoryController::class,'create'])->name('category.create');
        Route::post('create',[CategoryController::class,'store'])->name('category.store');
        Route::get('{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('{id}/edit',[CategoryController::class,'update'])->name('category.update');
        Route::get('{id}/delete',[CategoryController::class,'delete'])->name('category.delete');

    });
    Route::prefix('store')->group(function (){
        Route::get('/index',[\App\Http\Controllers\StoreController::class,'index'])->name('store.index');
        Route::get('/create',[\App\Http\Controllers\StoreController::class,'create'])->name('store.create');
        Route::post('/store',[\App\Http\Controllers\StoreController::class,'store'])->name('store.store');
        Route::get('{id}/edit',[\App\Http\Controllers\StoreController::class,'edit'])->name('store.edit');
        Route::post('/{id}/update',[\App\Http\Controllers\StoreController::class,'update'])->name('store.update');
        Route::get('/{id}/delete',[\App\Http\Controllers\StoreController::class,'destroy'])->name('store.delete');

    });

    Route::prefix('user')->group(function (){
        Route::get('/index',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');
        Route::get('/create',[\App\Http\Controllers\UserController::class,'create'])->name('user.create');
        Route::post('/create',[\App\Http\Controllers\UserController::class,'store'])->name('user.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
        Route::post('/edit/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\UserController::class,'destroy'])->name('user.destroy');
    });
    Route::prefix('shop')->group(function (){
        Route::get('',[\App\Http\Controllers\OderController::class,'index'])->name('shop.index');
        Route::get('/show',[\App\Http\Controllers\OderController::class,'showAll'])->name('shop.show');
        Route::get('{id}/category',[\App\Http\Controllers\OderController::class,'foodCategory'])->name('shop.category');
        Route::get('cart', [\App\Http\Controllers\OderController::class,'viewCart'])->name('shop.cart');
       Route::get('/{id}/addtocart',[\App\Http\Controllers\OderController::class,'addToCart'])->name('shop.addtocart');
       Route::get('/update',[\App\Http\Controllers\OderController::class,'updateCart'])->name('shop.updatecart');
       Route::get('/remove',[\App\Http\Controllers\OderController::class,'removeCart'])->name('shop.removecart');
       Route::get('/order',[\App\Http\Controllers\OderController::class,'order'])->name('shop.order');
    });


});




