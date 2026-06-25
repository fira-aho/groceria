<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

// Menampilkan halaman utama keranjang belanja
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Menangani request AJAX untuk update kuantitas barang
Route::post('/cart/update-qty', [CartController::class, 'updateQty'])->name('cart.update_qty');