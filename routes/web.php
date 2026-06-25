<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

use App\Http\Controllers\CheckoutController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store']);

Route::view('/success', 'success');

// Menampilkan halaman utama keranjang belanja
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Menangani request AJAX untuk update kuantitas barang
Route::post('/cart/update-qty', [CartController::class, 'updateQty'])->name('cart.update_qty');


// Menampilkan form register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

// Memproses data register
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

