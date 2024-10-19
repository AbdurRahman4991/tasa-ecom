<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\UpdateController;
use App\Http\Controllers\Web\frontendHomeController;
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Client section //

Route::get('/products', [frontendHomeController::class, 'productPage'])->name('clientHome');
Route::get('/product-details', [frontendHomeController::class, 'productDetails'])->name('productDetails');

// Admin section //

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile-update', [UpdateController::class, 'profileUpdate'])->name('profileUpdate');
Route::post('/profile-update', [UpdateController::class, 'postProfile'])->name('postProfile');
Route::get('/change-password', [UpdateController::class, 'changePassword'])->name('changePassword');
Route::post('/update-password', [UpdateController::class, 'updatePassword'])->name('updatePassword');
Route::get('/delete-user', [UpdateController::class, 'deleteUser'])->name('deleteUser');
