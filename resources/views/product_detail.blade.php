<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/product_detail.css') }}">
</head>
<body>

<div class="container">

    <a href="/" class="back-btn">← Kembali</a>

    <div class="detail-card">

        <div class="detail-image">
            <img src="{{ asset('assets/img/' . $product->gambar) }}">
        </div>

        <div class="detail-info">

            <span class="badge">
                {{ $product->badge }}
            </span>

            <h1>{{ $product->nama_produk }}</h1>

            <h2>
                Rp{{ number_format($product->harga) }}
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