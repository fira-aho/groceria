<?php

include __DIR__ . "/../config/database.php";

/** @var mysqli $conn */

include __DIR__ . "/../models/User.php";

$user = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

        $cek = $user->cekEmail($email);

        if (mysqli_num_rows($cek) > 0) {

            echo "<script>
                    alert('Email sudah digunakan!');
                  </script>";

        } else {

            $result = $user->register(
                $nama,
                $email,
                $password
            );

            if ($result) {

                echo "<script>
                        alert('Register berhasil!');
                        window.location.href='../login/login.php';
                      </script>";

            } else {

                echo "<script>
                        alert('Register gagal!');
                      </script>";

            }
        }
    }
}