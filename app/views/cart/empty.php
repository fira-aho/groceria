<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Empty Cart - Groceria</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../../public/assets/css/pages/empty.css" />
  </head>

  <body>
    <!-- ===== NAVBAR ===== -->
    <header class="navbar">
      <!-- Logo -->
      <div class="logo">
        <a href="../index.php"> Groceria </a>
      </div>

      <!-- Navigation -->
      <nav>
        <a href="../index.php"> Home </a>

        <a href="cart.php"> Cart </a>

        <a href="login.php"> Login </a>
      </nav>

      <!-- Icons -->
      <div class="icons">🛒 👤</div>
    </header>

    <!-- ===== EMPTY SECTION ===== -->
    <main class="empty-container">
      <!-- Gambar Empty Cart -->
      <img src="../../../public/assets/img/empty-cart.jpg" alt="Empty Cart" />

      <!-- Title -->
      <h2>Keranjang Belanja Masih Kosong</h2>

      <!-- Description -->
      <p>Yuk mulai tambahkan produk segar favorit Anda ke keranjang.</p>

      <!-- Button -->
      <button onclick="mulaiBelanja()" class="shop-btn">Mulai Belanja</button>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer">
      <p>
        Prodi Teknik Informatika <br />
        Universitas Esa Unggul <br />
        Mata Kuliah Pemrograman Web <br />
        Dosen Pengampu: DEWI SETIOWATI , A.Md., S.Pd., M.Tr.Kom.<br />
        Nama Kelompok: Groceria<br />
        Kelas: KH001<br /><br />

        <strong>Anggota Kelompok:</strong><br />

        &gt; Rafi Adriyan Ramadhan <br />
        &gt; Raffa Nugraha <br />
        &gt; M. Rafi Adhiya
      </p>
    </footer>

    <!-- JS -->
    <script src="../../../public/assets/js/modules/empty.js"></script>
  </body>
</html>
