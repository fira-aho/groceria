<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Kosong - Groceria</title>
    <link class="stylesheet" href="{{ asset('assets/css/pages/cart.css') }}">
</head>
<body>
    <main class="container" style="text-center; padding: 100px 20px;">
        <h2>Keranjang Belanjaanmu Masih Kosong</h2>
        <p>Yuk, isi dengan produk segar pilihanmu sekarang!</p>
        <br>
        <a href="{{ url('/') }}" style="background: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Mulai Belanja</a>
    </main>
</body>
</html>