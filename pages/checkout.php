<?php

include "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama_lengkap'];
    $telp = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO checkout (
        nama_lengkap,
        no_telepon,
        alamat
    )

    VALUES (
        '$nama',
        '$telp',
        '$alamat'
    )";

    mysqli_query($conn, $query);

    echo "<script>alert('Data berhasil disimpan!')</script>";
}

?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Checkout</title>

    <!-- FIX PATH CSS -->
    <link rel="stylesheet" href="../assets/css/pages/checkout.css" />
  </head>

  <body>
    <div class="checkout-container">
      <!-- KIRI -->
      <div class="checkout-form">
        <h2>🛒 Groceria</h2>
        <p>Promosi | Lokasi Toko</p>
        <hr />

        <h1>Formulir Checkout 📋</h1>
        <p>
          Pastikan detail pesanan Anda sudah benar sebelum melanjutkan
          pembayaran.
        </p>

        <h3>🚚 Informasi Pengiriman</h3>

        <!-- FORM -->
        <form method="POST" onsubmit="return validateForm();">
          <p>Nama Lengkap</p>
          <input
            type="text"
            id="nama"
            name="nama_lengkap"
            placeholder="Masukkan nama penerima"
            />

          <p>Nomor Telepon</p>
          <input 
            type="text" 
            id="telp" 
            name="no_telepon"
            placeholder="08xx xxxx xxxx" 
            />

          <p>Alamat Lengkap</p>
          <textarea
            id="alamat"
            name="alamat"
            rows="4"
            placeholder="Nama jalan, nomor rumah, kelurahan, kecamatan"
          ></textarea>

          <p>Catatan (Opsional)</p>
          <input
            type="text"
            name="catatan"
            placeholder="Contoh: Titip di satpam, tetangga atau warna pagar"
          />

          <!-- ✅ BUTTON HARUS DI DALAM FORM -->
          <button type="submit" class="pay-btn">✅ BAYAR SEKARANG</button>
        </form>

        <hr />

        <h3>💳 Metode Pembayaran</h3>

        <div class="payment-options">
          <button type="button">🏦 Transfer Bank</button>
          <button type="button">📱 E-Wallet</button>
          <button type="button">💵 Cash On Delivery</button>
        </div>
      </div>

      <!-- KANAN -->
      <div class="checkout-summary">
        <h3>🧾 Ringkasan & Bayar</h3>

        <ul>
          <li>
            <span>🥑 Alpukat Mentega</span>
            <span>Rp 78.000</span>
          </li>
          <li>
            <span>🍞 Roti Sourdough</span>
            <span>Rp 35.000</span>
          </li>
        </ul>

        <p class="row">
          <span>Subtotal</span>
          <span>Rp 113.000</span>
        </p>

        <p class="row">
          <span>Ongkir</span>
          <span>Rp 15.000</span>
        </p>

        <h2 class="total">
          <span>Total</span>
          <span>Rp 128.000</span>
        </h2>

        <p class="secure">🔒 Secure Checkout</p>
      </div>
    </div>

    <!-- FOOTER -->
    <footer>
      <p>
        Prodi Teknik Informatika <br />
        Universitas Esa Unggul <br />
        Mata Kuliah Pemrograman Web <br />
        Dosen Pengampu: DEWI SETIOWATII <br />
        Nama Kelompok: Groceria<br />
        Kelas: KH001<br /><br />

        Anggota:<br />
        > Rafi Adriyan Ramadhan <br />
        > Raffa Nugraha <br />
        > M. Rafi Adhiya
      </p>
    </footer>

    <script>
      function validateForm() {
        const nama = document.getElementById("nama").value.trim();
        const telp = document.getElementById("telp").value.trim();
        const alamat = document.getElementById("alamat").value.trim();

        if (nama === "") {
          alert("Nama belum diisi");
          return true;
        }

        if (telp === "") {
          alert("Nomor telepon belum diisi");
          return true;
        }

        if (alamat === "") {
          alert("Alamat belum diisi");
          return true;
        }

        alert("Pesanan diproses!");
        return true; // biar ga reload
      }
    </script>
  </body>
</html>
