<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm',[ContactController::class,'confirm']);
Route::post('/confirm',[ContactController::class,'store']);
Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'show']);
    Route::get('/admin/users/{user}',[AdminController::class,'show']);
    Route::delete('/admin/users/{user}',[AdminController::class,'destroy']);
    Route::get('/admin/search',[AdminController::class,'search']);
    Route::get('/admin/reset',[AdminController::class,'reset']);

});
Route::get('/login',[LoginController::class,'index']);
Route::get('/register',[LoginController::class,'create']);
Route::post('/logout',[LoginController::class,'logout'])->middleware('auth')->name('logout');

