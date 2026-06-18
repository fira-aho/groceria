<?php
include "../../controllers/LoginController.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Groceria</title>

    <link rel="stylesheet" href="../../../public/assets/css/pages/login.css">

</head>

<body>

    <main class="login-container">

        <section class="login-left">

            <img
                src="../../../public/assets/img/login-banner.jpg"
                alt="Login">

        </section>


        <section class="login-right">

            <h1>Selamat Datang</h1>

            <p>
                Login untuk melanjutkan belanja sehat bersama Groceria.
            </p>


            <form method="POST">

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


                <button type="submit">

                    Login

                </button>

            </form>


            <div class="register-link">

                Belum punya akun?

                <a href="../register/register.php">

                    Daftar sekarang

                </a>

            </div>

        </section>

    </main>

</body>

</html>