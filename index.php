
<?php
session_start();
include 'config/database.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Groceria</title>

    <link rel="stylesheet" type="text/css"
    href="http://localhost/groceria/assets/css/pages/home.css?v=1">
</head>


<body>
<script src="../assets/js/modules/home.js"></script>
<!-- NAVBAR -->
<div class="navbar">
    <h2 class="logo">Groceria</h2>

    <div class="menu">
        <a href="#">Beranda</a>
        <a href="#">Promosi</a>
        <a href="#">Lokasi Toko</a>
    </div>

    <input type="text" placeholder="Cari bahan segar pilihan..." class="search">

    <div class="icons">

        🛒

        <?php if(isset($_SESSION['user_id'])) { ?>

            <a href="pages/profile.php" class="profile-link">
                👤 <?= $_SESSION['nama']; ?>
            </a>

        <?php } else { ?>

            <a href="pages/login.php" class="signin-btn">
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
    <?php
    $query = mysqli_query($conn, "SELECT * FROM products_recomendations");

    while($data = mysqli_fetch_array($query)) {
    ?>

    <a href="pages/product_detail.php?id=<?= $data['id']; ?>" class="produk-link">

        <div class="produk-card">

            <div class="badge">
                <?= $data['badge']; ?>
            </div>

            <img 
                src="assets/img/<?= $data['gambar']; ?>" 
                width="100"
            >

            <p><?= $data['nama_produk']; ?></p>

            <h4>
                Rp<?= number_format($data['harga']); ?>
            </h4>

            <button>+ Keranjang</button>

        </div>

    </a>

<?php
}
?>
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

<script src="../assets/js/modules/home.js"></script>
</html>