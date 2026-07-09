<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Pesanan Berhasil</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/success.css') }}">
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
                <b>#GRC-{{ $order->id }}</b>
            </div>

            <div class="row">
                <span>Metode Pembayaran</span>
                <b>{{ $order->metode_pembayaran }}</b>
            </div>

            <hr />

            <div class="row">
                <span>Subtotal Produk</span>
                <b>Rp {{ number_format($order->total_price, 0, ',', '.') }}</b>
            </div>

            <div class="row">
                <span>Ongkir</span>
                <b>Rp 10.000</b> {{-- Sesuaikan dengan yang ada di CheckoutController --}}
            </div>

            <div class="row total">
                <span>Total Pembayaran</span>
                <b>Rp {{ number_format($order->total_price + 10000, 0, ',', '.') }}</b>
            </div>

            <div class="btn-group">
    <a href="{{ route('invoice.generate', ['order' => $order->id]) }}" class="btn primary">
        📄 Lihat Invoice
    </a>

    <button class="btn secondary">
        Lacak Pesanan
    </button>
    </div>

        </div>

        <!-- RIGHT -->
        <div class="right">

            <!-- RINGKASAN -->
            <div class="card">

                <p class="label">RINGKASAN BELANJA</p>

                <div class="row">
                    <span>SUBTOTAL</span>
                    <b>Rp {{ number_format($order->total_price, 0, ',', '.') }}</b>
                </div>

                <div class="row">
                    <span>ONGKIR</span>
                    <b>Rp 10.000</b>
                </div>

                <div class="row">
                    <span>TOTAL BELANJA</span>
                    <b>Rp {{ number_format($order->total_price + 10000, 0, ',', '.') }}</b>
                </div>

                <div class="progress">
                    <div class="bar"></div>
                </div>

                <div class="saving">
                    ✅ Pembayaran berhasil dikonfirmasi.
                </div>

            </div>

            <!-- SHIPPING -->
            <div class="card">

               <p class="label">ESTIMASI PENGIRIMAN</p>

<h3>Kurang dari 1 Jam</h3>

<p class="courier">
    Kurir: Groceria Express
</p>
            </div>

        </div>

    </div>

    <a href="{{ url('/') }}" class="back">
        Kembali ke Halaman Utama →
    </a>

</div>

</body>
</html>