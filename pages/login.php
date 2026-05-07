<?php

// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "groceria");

// Jika tombol login ditekan
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek akun ke database
    $query = mysqli_query($conn,
        "SELECT * FROM users
         WHERE email='$email'
         AND password='$password'"
    );

    // kalo akun ditemukan
    if(mysqli_num_rows($query) > 0){

    // Tambah riwayat login
    mysqli_query($conn,
        "INSERT INTO login_history (email)
         VALUES ('$email')"
    );

    echo "<script>alert('Login berhasil');</script>";

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

    <main class="login-container">

        <!-- LEFT -->
        <section class="login-left">

            <img src="../assets/img/login-banner.jpg"
                 alt="Groceria Login">

        </section>

        <!-- RIGHT -->
        <section class="login-right">

            <h1>Selamat Datang</h1>

            <p>
                Masuk ke akun Groceria Anda
            </p>

            <!-- FORM -->
            <form method="POST">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email"
                    required
                >

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                <button type="submit" name="login">
                    Login
                </button>

            </form>

        </section>

    </main>

</body>
</html>