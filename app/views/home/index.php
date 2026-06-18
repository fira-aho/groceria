<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Groceria</title>

    <link rel="stylesheet" href="http://localhost/groceria/public/assets/css/pages/home.css">
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

        <a href="#" class="cart-link">
            🛒
        </a>

        <?php if(isset($_SESSION['user_id'])) { ?>

            <a href="#" class="profile-link">
                👤 <?= $_SESSION['nama']; ?>
            </a>

        <?php } else { ?>

            <a href="#" class="signin-btn">
                Sign In
            </a>

        <?php } ?>

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
    <div class="card">🍴<p>Makanan</p></div>
    <div class="card">🍹<p>Minuman</p></div>
    <div class="card">🧴<p>Perawatan Tubuh</p></div>
    <div class="card">🏠<p>Kebutuhan Rumah</p></div>
</div>

<!-- PRODUK -->
<div class="produk-header">
    <h2>Rekomendasi Pekan Ini</h2>
    <a href="#">Lihat Semua →</a>
</div>

<div class="produk">

<?php foreach ($products as $data) { ?>

    <a href="#" class="produk-link">

        <div class="produk-card">

            <div class="badge">
                <?= $data['badge']; ?>
            </div>

            <img 
                src="http://localhost/groceria/public/assets/img/<?= $data['gambar']; ?>" 
                width="100"
            >

            <p><?= $data['nama_produk']; ?></p>

            <h4>
                Rp<?= number_format($data['harga']); ?>
            </h4>

            <button>+ Keranjang</button>

        </div>

    </a>

<?php } ?>

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

<script src="http://localhost/groceria/public/assets/js/modules/home.js"></script>
</body>
</html>