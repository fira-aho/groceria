<?php
include '../config/database.php';

$id = intval($_GET['id']);

$query = mysqli_query($conn, "
    SELECT * FROM products_recomendations 
    WHERE id='$id'
");

$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk</title>

    <link rel="stylesheet" href="../assets/css/pages/product_detail.css">
</head>
<body>

<div class="container">

    <a href="../index.php" class="back-btn">← Kembali</a>

    <div class="detail-card">

        <div class="detail-image">
            <img src="../assets/img/<?= $data['gambar']; ?>">
        </div>

        <div class="detail-info">

            <span class="badge">
                <?= $data['badge']; ?>
            </span>

            <h1><?= $data['nama_produk']; ?></h1>

            <h2>
                Rp<?= number_format($data['harga']); ?>
            </h2>

            <p>
                Produk segar pilihan terbaik dari Groceria.
                Cocok untuk kebutuhan harian Anda dengan kualitas premium.
            </p>

            <button>Beli Sekarang</button>

        </div>

    </div>

</div>

</body>
</html>