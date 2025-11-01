<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ModalController;

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
Route::post('/contacts/store',[ContactController::class,'store']);
Route::post('/contacts/edit',[ContactController::class,'edit']);
Route::get('/thanks',[ContactController::class,'thanks']);
Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/search',[AdminController::class,'search']);
    Route::get('/admin/reset',[AdminController::class,'reset']);
    Route::get('/modal', [ModalController::class, 'modal']);
});
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register/store',[RegisterController::class,'store']);
