<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $category }} - Groceria</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/home.css') }}">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2 class="logo">Groceria</h2>
    <div class="menu">
        <a href="#">Beranda</a>
        <a href="#">Promosi</a>
        <a href="#">Lokasi Toko</a>
    </div>
    <a href="#" class="search-btn">Cari bahan segar pilihan...</a>
    <div class="icons">
        <a href="#" class="cart-link">🛒</a>
        @auth
            <a href="/profile" class="profile-link">👤 {{ Auth::user()->name }}</a>
        @else
            <a href="/login" class="signin-btn">Sign In</a>
        @endauth
    </div>
</div>

<!-- HEADER KATEGORI -->
<div style="margin-top: 20px;">
    <a href="/" style="text-decoration:none; color:green;">← Kembali ke Beranda</a>
    <h2>Kategori: {{ $category }}</h2>
    <p class="subtitle">Menampilkan semua produk dalam kategori {{ $category }}</p>
</div>

<!-- PRODUK -->
<div class="produk" style="flex-wrap: wrap;">
    @forelse($products as $data)
        <a href="/produk/{{ $data['id'] }}" class="produk-link">
            <div class="produk-card">
                <div class="badge">{{ $data['category'] }}</div>
                <img src="{{ asset('assets/img/' . $data['image']) }}" width="100">
                <p>{{ $data['name'] }}</p>
                <h4>Rp{{ number_format($data['price']) }}</h4>
                <button type="button" class="btn-add-cart" data-id="{{ $data['id'] }}">+ Keranjang</button>
            </div>
        </a>
    @empty
        <p>Tidak ada produk dalam kategori ini.</p>
    @endforelse
</div>

<!-- FOOTER -->
<footer>
    <p>© 2026 Groceria</p>
</footer>

<script src="{{ asset('assets/js/modules/home.js') }}"></script>
</body>
</html>