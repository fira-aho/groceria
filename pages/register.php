<?php

// ===== KONEKSI DATABASE =====
include "../config/database.php";
/** @var mysqli $conn */

// ===== PROSES REGISTER =====
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi password
    if ($password != $confirm_password) {

        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
    } else {

        // Cek email sudah ada atau belum
        $cek = mysqli_query(
            $conn,
            "SELECT * FROM users WHERE email='$email'"
        );

        if (mysqli_num_rows($cek) > 0) {

            echo "<script>
                    alert('Email sudah digunakan!');
                  </script>";
        } else {

            // Query insert
            $query = "INSERT INTO users (nama, email, password)
                      VALUES ('$nama', '$email', '$password')";

            $result = mysqli_query($conn, $query);

            // Jika berhasil
            if ($result) {

                echo "<script>
                        alert('Register berhasil!');
                        window.location.href='login.php';
                      </script>";
            } else {

                echo "<script>
                        alert('Register gagal!');
                      </script>";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Groceria</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/pages/register.css">

</head>

<body>

    <!-- ===== CONTAINER ===== -->
    <main class="register-container">


        <!-- ===== LEFT SIDE ===== -->
        <section class="register-left">

            <img src="../assets/img/register-banner.jpg" alt="Register">

        </section>


        <!-- ===== RIGHT SIDE ===== -->
        <section class="register-right">

            <h1>Buat Akun Baru</h1>

            <p>
                Daftar sekarang dan mulai belanja sehat bersama Groceria.
            </p>


            <!-- ===== FORM ===== -->
            <form method="POST">

                <!-- Nama -->
                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required>


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


                <!-- Konfirmasi Password -->
                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="confirm_password"
                    placeholder="Konfirmasi password"
                    required>


                <!-- Button -->
                <button type="submit">

                    Register

                </button>

            </form>


            <!-- Login Link -->
            <div class="login-link">

                Sudah punya akun?

                <a href="login.php">
                    Login sekarang
                </a>

            </div>

        </section>

    </main>

</body>

</html>