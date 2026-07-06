<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Groceria</title>
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

    <a href="#" class="search-btn">
        Cari bahan segar pilihan...
    </a>

    <div class="icons">
        <a href="/cart" class="cart-link">🛒</a>

        @auth
            <a href="/profile" class="profile-link">
                👤 {{ Auth::user()->name }}
            </a>
        @else
            <a href="/login" class="signin-btn">Sign In</a>
        @endauth
    </div>
</div>

<!-- HERO -->
<div class="section-promo">
    <p class="tag">EDISI MINGGU INI</p>
    <h1>Kesegaran Kebun <br> Langsung ke Meja</h1>
    <p>Nikmati bahan organik terbaik dengan diskon hingga 40%</p>
    <div class="btn-group">
        <button class="btn-primary">Belanja Sekarang</button>
        <button class="btn-secondary">Lihat Katalog</button>
    </div>
</div>

<!-- KATEGORI -->
<h2>Kategori Pilihan</h2>
<p class="subtitle">Eksplorasi produk berdasarkan kebutuhan Anda</p>

<div class="kategori">
    <a href="/kategori/Makanan" class="card">🍴<p>Makanan</p></a>
    <a href="/kategori/Minuman" class="card">🍹<p>Minuman</p></a>
    <a href="/kategori/Perawatan Tubuh" class="card">🧴<p>Perawatan Tubuh</p></a>
    <a href="/kategori/Kebutuhan Rumah" class="card">🏠<p>Kebutuhan Rumah</p></a>
</div>

<!-- PRODUK -->
<div class="produk-header">
    <h2>Rekomendasi Pekan Ini</h2>
    <a href="#">Lihat Semua →</a>
</div>

<div class="produk">
@foreach($products as $data)
    <a href="/produk/{{ $data['id'] }}" class="produk-link">
        <div class="produk-card">
            <div class="badge">{{ $data['category'] }}</div>
            <img src="{{ asset('assets/img/' . $data['image']) }}" width="100">
            <p>{{ $data['name'] }}</p>
            <h4>Rp{{ number_format($data['price']) }}</h4>
            <button type="button" class="btn-add-cart" data-id="{{ $data['id'] }}">+ Keranjang</button>
        </div>
    </a>
@endforeach
</div>

<!-- INSPIRE -->
<div class="inspire">
    <div>
        <h2>Inspirasi Dapur dari Grocer</h2>
        <p>Dapatkan resep & tips setiap minggu</p>
        <input type="text" placeholder="Email Anda">
        <button>Berlangganan</button>
    </div>
</div>

<!-- FOOTER -->
<footer>
    <p>© 2026 Groceria</p>
</footer>

<script src="{{ asset('assets/js/modules/home.js') }}"></script>
</body>
</html>