<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "groceria");

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


// Proses login saat tombol ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query cek user
    $query = "SELECT * FROM users 
              WHERE email='$email' 
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    // Jika data ditemukan
    if (mysqli_num_rows($result) > 0) {

        echo "<script>
                alert('Login berhasil!');
              </script>";

    } else {

        echo "<script>
                alert('Email atau password salah!');
              </script>";

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" 
          content="width=device-width, initial-scale=1.0">

    <title>Login - Groceria</title>

    <!-- CSS -->
    <link rel="stylesheet" 
          href="../assets/css/pages/login.css">

</head>

<body>

    <!-- ===== LOGIN CONTAINER ===== -->
    <main class="login-container">

        <!-- ===== LEFT SIDE ===== -->
        <section class="login-left">

            <img src="../assets/img/login-banner.jpg" 
                 alt="Groceria Login">

        </section>


        <!-- ===== RIGHT SIDE ===== -->
        <section class="login-right">

            <h1>Selamat Datang</h1>

            <p>
                Masuk ke akun Groceria Anda 
                untuk melanjutkan belanja sehat.
            </p>


            <!-- ===== FORM ===== -->
            <form method="POST">

                <!-- Email -->
                <label>Email</label>

                <input 
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Masukkan email"
                    required
                >


                <!-- Password -->
                <label>Password</label>

                <input 
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Masukkan password"
                    required
                >


                <!-- Button -->
                <button type="submit">
                    Login
                </button>

            </form>


            <!-- Register Link -->
            <div class="register-link">

                Belum punya akun?

                <a href="register.php">
                    Daftar sekarang
                </a>

            </div>

        </section>

    </main>

</body>
</html> x`