<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LP_HomeController;
use App\Http\Controllers\LP_ShopController;
use App\Http\Controllers\SellerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LP_HomeController::class,'index'])->name('home');


Route::get('/about', function () {
    return view('LP.about');
});
Route::get('/contact', function () {
    return view('LP.contact');
});
Route::get('/shop', [LP_ShopController::class,'index'])->name('shop');
Route::get('/detail/{product:id}', [LP_ShopController::class,'show'])->name('shop');





Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index')->middleware('auth');
Route::post('/cart/remove/{cart:id}', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');
Route::get('/checkout', [CartController::class, 'showCheckout'])->name('showCheckout')->middleware('auth');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');

Route::middleware('auth','seller')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/dashboard/product', ProductController::class);
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/sale', SaleController::class);
    Route::resource('/dashboard/user', SellerController::class);
    Route::get('/dashboard',[DashboardController::class,'index']);
});

require __DIR__.'/auth.php';
