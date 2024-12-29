<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\UpdateController;
use App\Http\Controllers\Web\frontendHomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Client section //

Route::get('/admin/register', [frontendHomeController::class, 'adminRegister'])->name('adminRegister');
Route::get('/products', [frontendHomeController::class, 'productPage'])->name('clientHome');
Route::get('/product-details', [frontendHomeController::class, 'productDetails'])->name('productDetails');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin section //

Auth::routes();

Route::get('/home-admin', [HomeController::class, 'adminIndex'])->name('adminIndex');
Route::get('/profile-update', [UpdateController::class, 'profileUpdate'])->name('profileUpdate');
Route::post('/profile-update', [UpdateController::class, 'postProfile'])->name('postProfile');
Route::get('/change-password', [UpdateController::class, 'changePassword'])->name('changePassword');
Route::post('/update-password', [UpdateController::class, 'updatePassword'])->name('updatePassword');
Route::get('/delete-user', [UpdateController::class, 'deleteUser'])->name('deleteUser');

// Product page //

Route::resource('category',CategoryController::class);
Route::resource('sub-category',SubCategoryController::class);
Route::get('category-show', [SubCategoryController::class, 'category'])->name('showSubcategory');
Route::get('dependncy', [ProductController::class, 'dependencyCategory'])->name('dependencyCategory');
Route::get('/product', [ProductController::class, 'product'])->name('showProduct');
Route::post('product-store', [ProductController::class, 'store'])->name('product.store');
Route::get('product-list', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update', [ProductController::class, 'update'])->name('products.update');

// Vendor section //

Route::get('/vendor-register', [frontendHomeController::class, 'vendorRegister'])->name('vendorRegister');
Route::get('/home-vendor', [HomeController::class, 'vendorIndex'])->name('vendorIndex');
