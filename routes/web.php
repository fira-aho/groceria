<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
|
*/

// ==========================================

// Rute Halaman Utama
Route::get('/', [HomeController::class, 'index']);
Route::get('/produk/{id}', [HomeController::class, 'detail']); 

// Rute untuk Checkout
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'store']);
Route::view('/success', 'success.success');

// Rute untuk tamu yang belum login (Register & Login)
Route::middleware('guest')->group(function () {
    // Registrasi
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    // Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

// Rute khusus untuk pelanggan yang sudah login (Cart & Logout)
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Keranjang Belanja (Cart)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update-qty', [CartController::class, 'updateQty'])->name('cart.update_qty');
    Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
});

// ==========================================
// RUTE KHUSUS ADMIN
// ==========================================
Route::prefix('admin')->middleware(['auth', IsAdmin::class])->group(function () {
    
    // Halaman Utama Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Halaman Manajemen Produk (Otomatis membuat semua rute CRUD)
    Route::resource('produk', ProductController::class);
    
});

// Rute untuk menambahkan produk ke keranjang
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');


// Rute untuk menambahkan produk ke keranjang
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.store');

// Rute untuk Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->middleware('auth')->name('profile.update_password');

// Rute untuk halaman kategori produk
Route::get('/kategori/{category}', [HomeController::class, 'category']);

