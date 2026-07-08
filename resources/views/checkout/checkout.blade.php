<!doctype html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<title>Checkout</title>
<link rel="stylesheet" href="{{ asset('assets/css/pages/checkout.css') }}">
</head>

<body>

<div class="checkout-container">

    <!-- KIRI -->
    <div class="checkout-form">

        <h2>🛒 Groceria</h2>
        <p>Promosi | Lokasi Toko</p>
        <hr />

        <h1>Formulir Checkout 📋</h1>

        <p>Pastikan detail pesanan Anda sudah benar sebelum melanjutkan pembayaran.</p>

        <h3>🚚 Informasi Pengiriman</h3>

        <form method="POST" action="/checkout" onsubmit="return validateForm();">
            @csrf

            <p>Nama Lengkap</p>
            <input type="text" id="nama" name="nama_lengkap" />

            <p>Nomor Telepon</p>
            <input type="text" id="telp" name="no_telepon" />

            <p>Alamat Lengkap</p>
            <textarea id="alamat" name="alamat"></textarea>

            <p>Catatan (Opsional)</p>
            <input type="text" name="catatan" placeholder="Catatan tambahan" />

            <input type="hidden" id="metode" name="metode_pembayaran" />

            <button type="submit" class="pay-btn">
                ✅ BAYAR SEKARANG
            </button>

        </form>

        <hr />

        <h3>💳 Metode Pembayaran</h3>

        <div class="payment-options">

            <button type="button" onclick="selectPayment(this)">
                🏦 Transfer Bank
            </button>

            <button type="button" onclick="selectPayment(this)">
                📱 E-Wallet
            </button>

            <button type="button" onclick="selectPayment(this)">
                💵 Cash On Delivery
            </button>

        </div>

    </div>

    <!-- KANAN -->
    <div class="checkout-summary">

        <h3>🧾 Ringkasan & Bayar</h3>

        <ul>

            @forelse($cartItems as $item)

                <li>

                    <span>
                        🛒 {{ $item->product->name }}
                        (x{{ $item->qty }})
                    </span>

                    <span>
                        Rp {{ number_format($item->subtotal,0,',','.') }}
                    </span>

                </li>

            @empty

                <li>Keranjang kosong</li>

            @endforelse

        </ul>

        <p class="row">

            <span>Subtotal</span>

            <span>
                Rp {{ number_format($subtotal,0,',','.') }}
            </span>

        </p>

        <p class="row">

            <span>Ongkir</span>

            <span>
                Rp {{ number_format($ongkir,0,',','.') }}
            </span>

        </p>

        <h2 class="total">

            <span>Total</span>

            <span>
                Rp {{ number_format($total,0,',','.') }}
            </span>

        </h2>

        <p class="secure">
            🔒 Secure Checkout
        </p>

    </div>

</div>

<footer>
    <p>
        Prodi Teknik Informatika - Universitas Esa Unggul <br>
        Mata Kuliah Pemrograman Web <br>
        Kelompok Groceria
    </p>
</footer>

<script>

function validateForm() {

    const nama = document.getElementById("nama").value.trim();
    const telp = document.getElementById("telp").value.trim();
    const alamat = document.getElementById("alamat").value.trim();
    const metode = document.getElementById("metode").value.trim();

    if (nama === "") {
        alert("Nama belum diisi");
        return false;
    }

    if (telp === "") {
        alert("Nomor telepon belum diisi");
        return false;
    }

    if (alamat === "") {
        alert("Alamat belum diisi");
        return false;
    }

    if (metode === "") {
        alert("Pilih metode pembayaran");
        return false;
    }

    return true;
}

function selectPayment(button) {

    document.querySelectorAll(".payment-options button").forEach(btn => {

        btn.style.background = "";
        btn.style.color = "";
        btn.style.border = "";

    });

    button.style.background = "green";
    button.style.color = "white";
    button.style.border = "2px solid darkgreen";

    document.getElementById("metode").value = button.innerText;

}

</script>

</body>
</html>