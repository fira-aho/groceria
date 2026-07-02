<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
|
*/

// Rute Halaman Utama
Route::get('/', [HomeController::class, 'index']);
Route::get('/produk/{id}', [HomeController::class, 'detail']); 

// Rute untuk Registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Rute untuk Profile (hanya bisa diakses kalau sudah login)
Route::get('/profile', [HomeController::class, 'profile'])->middleware('auth');

// Rute untuk Keranjang Belanja (Cart)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update-qty', [CartController::class, 'updateQty'])->name('cart.update_qty');

// Rute untuk Checkout
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store']);
Route::view('/success', 'success.success');

// Menampilkan form login
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Memproses verifikasi login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Memproses logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
