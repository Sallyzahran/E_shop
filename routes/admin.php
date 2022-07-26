<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategorySizeController;
use App\Http\Controllers\Admin\ProductPropController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ContactController;






    /*Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');*/


Route::resource('admins', AdminController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('products', ProductController::class);
Route::resource('products', ProductController::class);
Route::resource('products_images', ProductImageController::class);
Route::resource('products_props', ProductPropController::class);
Route::resource('products_colors', ProductColorController::class);
Route::resource('sliders', SliderController::class);
Route::resource('orders', OrderController::class)->only('index','show','update');

Route::get('/categories/{category_id}/sizes', [CategorySizeController::class, 'index'])->name('category.sizes');
Route::post('/categories/{category_id}/sizes', [CategorySizeController::class, 'store'])->name('category.sizes.store');
Route::delete('/categories/sizes/{id}', [CategorySizeController::class, 'destroy'])->name('category.sizes.delete');

Route::resource('contacts', ContactController::class)->only('index','show','update');
Route::view('notes','admin.notes');


