<?php

session_start();

include __DIR__ . "/../config/database.php";
/** @var mysqli $conn */
include __DIR__ . "/../models/User.php";

$user = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $user->login($email, $password);

    if (mysqli_num_rows($result) > 0) {

        $data = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];

        echo "<script>
                alert('Login berhasil!');
                window.location.href='../../public/index.php';
              </script>";

    } else {

        echo "<script>
                alert('Email atau password salah!');
              </script>";

    }
}