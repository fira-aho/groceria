<?php

// ===== KONEKSI DATABASE =====
include "../config/database.php";
/** @var mysqli $conn */

// ===== AMBIL DATA CART =====
$query = "SELECT * FROM cart";

$result = mysqli_query($conn, $query);


// ===== CEK CART KOSONG =====
if (mysqli_num_rows($result) == 0) {

    header("Location: empty.php");

}

?>


<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart - Groceria</title>

    <link rel="stylesheet" href="../assets/css/pages/cart.css">

</head>

<body>

    <!-- ===== NAVBAR ===== -->
    <header class="navbar">

        <div class="logo">

            <a href="../index.php">
                Groceria
            </a>

        </div>

        <nav>

            <a href="../index.php">
                Home
            </a>

            <a href="cart.php">
                Cart
            </a>

            <a href="login.php">
                Login
            </a>

        </nav>

        <div class="icons">
            🛒 👤
        </div>

    </header>



    <!-- ===== CONTAINER ===== -->
    <main class="container">


        <!-- ===== LEFT ===== -->
        <section class="cart-left">

            <h2>Keranjang Belanja Anda</h2>

            <p class="subtitle">
                Daftar belanjaan kurasi pilihan Anda untuk hari yang lebih segar.
            </p>


            <!-- ===== LOOP CART ===== -->
            <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <div
                class="cart-item"
                data-price="<?php echo $row['price']; ?>"
            >

                <!-- Gambar -->
                <img
                    src="../assets/img/<?php echo $row['image']; ?>"
                    alt="Produk"
                >


                <!-- Info -->
                <div class="item-info">

                    <h4>
                        <?php echo $row['product_name']; ?>
                    </h4>

                    <span>
                        Rp <?php echo number_format($row['price'], 0, ',', '.'); ?>
                    </span>

                </div>


                <!-- Quantity -->
                <div class="qty">

                    <button class="minus-btn">
                        -
                    </button>

                    <span class="qty-value">
                        <?php echo $row['qty']; ?>
                    </span>

                    <button class="plus-btn">
                        +
                    </button>

                </div>


                <!-- Subtotal -->
                <div class="subtotal">

                    Rp <span class="subtotal-value">
                        <?php echo number_format($row['subtotal'], 0, ',', '.'); ?>
                    </span>

                </div>

            </div>

            <?php } ?>


            <!-- ===== PROMO ===== -->
            <div class="promo-box">

                <p>Ada kode promo?</p>

                <a href="#" onclick="cekPromo()">
                    Tambah Kode
                </a>

            </div>



            <!-- ===== REKOMENDASI ===== -->
            <h3>Lengkapi Belanjaan Anda</h3>

            <div class="recommendation">

                <div class="card">

                    <img src="../assets/img/yogurt.jpg" alt="Yogurt">

                    <p>Greek Yogurt Berry</p>

                    <span>Rp 32.000</span>

                    <button>Tambah</button>

                </div>


                <div class="card">

                    <img src="../assets/img/alpukat.jpg" alt="Alpukat">

                    <p>Alpukat Mentega</p>

                    <span>Rp 15.500</span>

                    <button>Tambah</button>

                </div>


                <div class="card">

                    <img src="../assets/img/madu.jpg" alt="Madu">

                    <p>Madu Hutan</p>

                    <span>Rp 78.000</span>

                    <button>Tambah</button>

                </div>

            </div>

        </section>



        <!-- ===== RIGHT ===== -->
        <aside class="cart-right">


            <!-- ===== BUDGET ===== -->
            <div class="budget-box">

                <h4>Budget Control</h4>

                <p id="budget-text">
                    Rp 100.000
                </p>


                <!-- Progress -->
                <div class="progress">

                    <div class="progress-fill"></div>

                </div>


                <!-- Info -->
                <small id="budget-info">

                    Digunakan Rp 0 dari Rp 100.000

                </small>


                <!-- Warning -->
                <p id="budget-warning"></p>

            </div>



            <!-- ===== SUMMARY ===== -->
            <div class="summary">

                <h3>Ringkasan Belanja</h3>


                <div class="row">

                    <span>Total Harga</span>

                    <span id="total-price">
                        Rp 0
                    </span>

                </div>


                <hr>


                <!-- Checkout -->
                <a href="checkout.php">

                    <button class="checkout-btn">

                        Lanjut ke Checkout →

                    </button>

                </a>

            </div>

        </aside>

    </main>



    <!-- ===== FOOTER ===== -->
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


    <!-- JS -->
    <script src="../assets/js/modules/cart.js"></script>

</body>
</html>