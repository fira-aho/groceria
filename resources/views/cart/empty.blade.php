<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Kosong - Groceria</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/empty.css') }}">
</head>
<body>
    <!-- NAVBAR -->
    <div class="cart-navbar">
        <div class="nav-left">
            <h2 class="logo"><a href="/">Groceria</a></h2>
            <span class="nav-icons">
                <a href="/cart">🛒</a>
            </span>
        </div>
    
        <div class="nav-right">
            <a href="/">Home</a>
            <a href="/cart">Cart</a>
            
            @auth
                <!-- Menampilkan nama user jika sudah login -->
                <a href="/profile" class="profile-link">
                    👤 {{ Auth::user()->name }}
                </a>
                
                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @else
                <!-- Menampilkan tombol login jika tamu -->
                <a href="/login">Login</a>
            @endauth
        </div>
    </div>

    <!-- BAGIAN YANG DIPERBAIKI -->
    <main class="empty-container">
        <h2>Keranjang Belanjaanmu Masih Kosong</h2>
        <p>Yuk, isi dengan produk segar pilihanmu sekarang!</p>
        <a href="{{ url('/') }}" class="shop-btn">Mulai Belanja</a>
    </main>

</body>
</html>