<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cart - Groceria</title>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/cart.css') }}">
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <a href="{{ url('/') }}">Groceria</a>
        </div>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('cart.index') }}">Cart</a>
            <a href="{{ url('/login') }}">Login</a>
        </nav>
        <div class="icons">🛒👤</div>
    </header>

    <main class="container">
        <section class="cart-left">
            <h2>Keranjang Belanja Anda</h2>
            <p class="subtitle">Daftar belanjaan kurasi pilihan Anda untuk hari yang lebih segar.</p>

            @foreach ($cartItems as $row)
            <div class="cart-item" data-id="{{ $row->id }}" data-price="{{ $row->product->price }}">
                <img src="{{ asset('assets/img/' . $row->product->image) }}" alt="Produk">
                
                <div class="item-info">
                    <h4>{{ $row->product->name }}</h4>
                    <span>Rp {{ number_format($row->product->price, 0, ',', '.') }}</span>
                </div>
                
                <div class="qty">
                    <button class="minus-btn">-</button>
                    <span class="qty-value">{{ $row->qty }}</span>
                    <button class="plus-btn">+</button>
                </div>
                
                <div class="subtotal">
                    Rp <span class="subtotal-value">{{ number_format($row->subtotal, 0, ',', '.') }}</span>
                </div>
            </div>
            @endforeach

            <div class="promo-box">
                <p>Ada kode promo?</p>
                <a href="#" onclick="cekPromo()">Tambah Kode</a>
            </div>

            <h3>Lengkapi Belanjaan Anda</h3>
            <div class="recommendation">
                
                @foreach ($recommendations as $rek)
                <div class="card">
                    <img src="{{ asset('assets/img/' . $rek->image) }}" alt="{{ $rek->name }}">
                    <p>{{ $rek->name }}</p>
                    <span>Rp {{ number_format($rek->price, 0, ',', '.') }}</span>
                    <button>Tambah</button>
                </div>
                @endforeach

            </div>
        </section>

        <aside class="cart-right">
            <div class="budget-box">
                <h4>Budget Control</h4>
                <p id="budget-text">Rp 100.000</p>
                <div class="progress">
                    <div class="progress-fill"></div>
                </div>
                <small id="budget-info">Digunakan Rp 0 dari Rp 100.000</small>
                <p id="budget-warning"></p>
            </div>

            <div class="summary">
                <h3>Ringkasan Belanja</h3>
                <div class="row">
                    <span>Diskon</span>
                    <span class="discount" id="discount-value">- Rp 0</span>
                </div>
                <div class="row">
                    <span>Total Harga</span>
                    <span id="total-price">Rp 0</span>
                </div>
                <hr>
                <a href="{{ url('/checkout') }}">
                    <button class="checkout-btn">Lanjut ke Checkout →</button>
                </a>
            </div>
        </aside>
    </main>

    <footer class="footer">
        <p>
            Prodi Teknik Informatika <br>
            Universitas Esa Unggul <br>
            Mata Kuliah Pemrograman Web <br>
            Dosen Pengampu: DEWI SETIOWATI , A.Md., S.Pd., M.Tr.Kom.<br>
            Nama Kelompok: Groceria<br>
            Kelas: KH001<br><br>
            <strong>Anggota Kelompok:</strong><br>
            &gt; Rafi Adriyan Ramadhan <br>
            &gt; Raffa Nugraha <br>
            &gt; M. Rafi Adhiya
        </p>
    </footer>

    <script src="{{ asset('assets/js/modules/cart.js') }}"></script>
</body>
</html>