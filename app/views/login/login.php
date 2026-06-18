<?php
session_start();

// ===== KONEKSI DATABASE =====
include "../config/database.php";
/** @var mysqli $conn */

// ===== PROSES LOGIN =====
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query cek user
    $query = "SELECT * FROM users
              WHERE email='$email'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    // Jika berhasil login
    if (mysqli_num_rows($result) > 0) {

        $data = mysqli_fetch_assoc($result);

        // Simpan session user
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];

        echo "<script>
                alert('Login berhasil!');
                window.location.href='../index.php';
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Groceria</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/pages/login.css">

</head>

<body>

    <!-- ===== CONTAINER ===== -->
    <main class="login-container">


        <!-- ===== LEFT SIDE ===== -->
        <section class="login-left">

            <img src="../assets/img/login-banner.jpg" alt="Login">

        </section>


        <!-- ===== RIGHT SIDE ===== -->
        <section class="login-right">

            <h1>Selamat Datang</h1>

            <p>
                Login untuk melanjutkan belanja sehat bersama Groceria.
            </p>


            <!-- ===== FORM ===== -->
            <form method="POST">

                <!-- Email -->
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required>


                <!-- Password -->
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>


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

</html>