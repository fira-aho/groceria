<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

            <h1>{{ $product->nama_produk }}</h1>

            <h2>
                Rp{{ number_format($product->harga) }}
            </h2>

            <p>
                Produk segar pilihan terbaik dari Groceria.
                Cocok untuk kebutuhan harian Anda dengan kualitas premium.
            </p>

            {{-- Tombol Beli Sekarang --}}
            <button class="btn-beli" data-id="{{ $product->id }}">Beli Sekarang</button>

        </div>

    </div>

</div>

<script>
    document.querySelector('.btn-beli').addEventListener('click', function(e) {
        e.preventDefault();

        const productId = this.dataset.id;

        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ product_id: productId, qty: 1 }),
        })
        .then(res => {
            if (res.status === 401) {
                alert('Silakan login terlebih dahulu.');
                window.location.href = '/login';
                throw new Error('Unauthorized');
            }
            return res.json();
        })
        .then(data => {
            if (data.status === 'success') {
                alert('Produk berhasil ditambahkan ke keranjang!');
            }
        })
        .catch(error => {
            if (error.message !== 'Unauthorized') {
                alert('Gagal menambahkan ke keranjang.');
            }
        });
    });
</script>

</body>
</html>