<?php

// ===== KONEKSI DATABASE =====
$conn = mysqli_connect("localhost", "root", "", "groceria");

// ===== CEK KONEKSI =====
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


// ===== PROSES REGISTER =====
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // Validasi password
    if ($password != $confirm) {

        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";

    } else {

        // Query INSERT
        $query = "INSERT INTO users (nama, email, password)
                  VALUES ('$nama', '$email', '$password')";

        // Jalankan query
        $result = mysqli_query($conn, $query);

        // Jika berhasil
        if ($result) {

            echo "<script>
                    alert('Register berhasil!');
                  </script>";

        } else {

            echo "<script>
                    alert('Register gagal!');
                  </script>";

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

    <link rel="stylesheet" href="../assets/css/pages/register.css">

</head>

<body>

    <!-- ===== CONTAINER ===== -->
    <main class="register-container">


        <!-- ===== LEFT ===== -->
        <section class="register-left">

            <img src="../assets/img/register-banner.jpg" alt="Register">

        </section>


        <!-- ===== RIGHT ===== -->
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
                    required
                >


                <!-- Email -->
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required
                >


                <!-- Password -->
                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >


                <!-- Confirm Password -->
                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="confirm_password"
                    placeholder="Konfirmasi password"
                    required
                >


                <!-- Button -->
                <button type="submit">
                    Register
                </button>

            </form>


            <!-- Login -->
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