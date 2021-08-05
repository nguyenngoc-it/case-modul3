<?php

use App\Http\Controllers\FoodsController;
use App\Http\Controllers\LoginController;
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
    Route::get('index',[FoodsController::class,'index'])->name('home.index');
});
