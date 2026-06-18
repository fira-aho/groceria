<?php
include "../../controllers/RegisterController.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register - Groceria</title>

    <link rel="stylesheet"
          href="../../../public/assets/css/pages/register.css">

</head>

<body>

    <main class="register-container">

        <!-- LEFT -->
        <section class="register-left">

            <img
                src="../../../public/assets/img/register-banner.jpg"
                alt="Register">

        </section>


        <!-- RIGHT -->
        <section class="register-right">

            <h1>Buat Akun Baru</h1>

            <p>
                Daftar sekarang dan mulai belanja sehat bersama Groceria.
            </p>

            <form method="POST">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required>


                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required>


                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>


                <label>Konfirmasi Password</label>

                <input
                    type="password"
                    name="confirm_password"
                    placeholder="Konfirmasi password"
                    required>


                <button type="submit">

                    Register

                </button>

            </form>


            <div class="login-link">

                Sudah punya akun?

                <a href="../login/login.php">

                    Login sekarang

                </a>

            </div>

        </section>

    </main>

</body>

</html>