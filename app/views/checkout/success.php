<?php
session_start();

$metode = $_SESSION['metode_pembayaran'] ?? "Belum Dipilih";
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Pesanan Berhasil</title>
    <link rel="stylesheet" href="../assets/css/pages/success.css" />
</head>

<body>

<div class="container">

    <!-- ICON -->
    <div class="icon">✔</div>

    <!-- TITLE -->
    <h1>Pesanan Berhasil!</h1>

    <p class="subtitle">
        Terima kasih telah berbelanja di Groceria.
        Tim kami sedang menyiapkan bahan segar terbaik untuk Anda.
    </p>

    <div class="content">

        <!-- LEFT CARD -->
        <div class="card">

            <div class="card-header">
                <h3>Detail Pesanan</h3>
                <span class="status">DIPROSES</span>
            </div>

            <div class="row">
                <span>Nomor Pesanan</span>
                <b>#GRC-12345</b>
            </div>

            <div class="row">
                <span>Metode Pembayaran</span>
                <b><?php echo $metode; ?></b>
            </div>

            <hr />

            <div class="row total">
                <span>Total Pembayaran</span>
                <b>Rp 98.000</b>
            </div>

            <div class="btn-group">
                <button class="btn primary">📄 Lihat Invoice</button>
                <button class="btn secondary">Lacak Pesanan</button>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="right">

            <!-- BUDGET -->
            <div class="card">

                <p class="label">RINGKASAN BUDGET</p>

                <div class="row">
                    <span>TOTAL BELANJA</span>
                    <b>Rp 98.000</b>
                </div>

                <div class="progress">
                    <div class="bar"></div>
                </div>

                <div class="saving">
                    💰 Hemat Rp 2.000 dari budget Anda
                </div>

            </div>

            <!-- SHIPPING -->
            <div class="card">

                <p class="label">ESTIMASI PENGIRIMAN</p>

                <h3>Besok, 08:00 - 10:00</h3>

                <p class="courier">
                    Kurir: Groceria Express
                </p>

            </div>

        </div>

    </div>

    <a href="checkout.php" class="back">
        Kembali ke Beranda Belanja →
    </a>

</div>

</body>
</html>