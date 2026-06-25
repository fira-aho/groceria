<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Groceria</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/css/pages/cart.css') }}">
</head>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="cart-item" data-id="{{ $row->id }}" data-price="{{ $row->price }}">
                <img src="{{ asset('assets/img/' . $row->image) }}" alt="Produk">
                
                <div class="item-info">
                    <h4>{{ $row->product_name }}</h4>
                    <span>Rp {{ number_format($row->price, 0, ',', '.') }}</span>
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
                <div class="card">
                    <img src="{{ asset('assets/img/yogurt.jpg') }}" alt="Yogurt">
                    <p>Greek Yogurt Berry</p>
                    <span>Rp 32.000</span>
                    <button>Tambah</button>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/img/alpukat.jpg') }}" alt="Alpukat">
                    <p>Alpukat Mentega</p>
                    <span>Rp 15.500</span>
                    <button>Tambah</button>
                </div>
                <div class="card">
                    <img src="{{ asset('assets/img/madu.jpg') }}" alt="Madu">
                    <p>Madu Hutan</p>
                    <span>Rp 78.000</span>
                    <button>Tambah</button>
                </div>
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