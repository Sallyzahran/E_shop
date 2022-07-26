<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\ContactController;





//admins

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin');

/*Route::get('/admins', function () {
    return view('admin.admin.index');
});*/


Route::get('/',[HomeController::class, 'index']);

Route::get('local',function(){
session(['local'=>request('local')]);
return redirect('/');

});

Route::get('/category/{category}',[CategoryController::class, 'show'])->name('category.show');

Route::get('/carts/add/{product_id}/q/{quantity}',[CartController::class, 'store'])->name('cart.store');
Route::get('/carts',[CartController::class, 'index'])->name('cart.index');
Route::get('/carts/delete/{index}',[CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/carts/update/',[CartController::class, 'update'])->name('cart.update');
Route::post('/checkout',[OrderController::class, 'store']);
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/order',[OrderController::class, 'show']);


Route::middleware('auth')->group(function () {
    Route::get('/orders',[OrderController::class, 'index']);

});

Route::post('/contact',[ContactController::class, 'store']);
