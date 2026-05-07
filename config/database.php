<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "groceria";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi database gagal");
}

?>