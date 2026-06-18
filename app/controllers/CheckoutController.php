<?php

session_start();

include_once __DIR__ . "/../config/database.php";
include_once __DIR__ . "/../models/Order.php";

class CheckoutController
{
    public function process()
    {
        global $conn;

        // LOGIKA CART DIPINDAH KE SINI
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $uniqueCart = [];
        $seen = [];

        foreach ($_SESSION['cart'] as $item) {
            if (!in_array($item['name'], $seen)) {
                $uniqueCart[] = $item;
                $seen[] = $item['name'];
            }
        }

        $cart = $uniqueCart;

        // PROSES CHECKOUT
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama = $_POST['nama_lengkap'];
            $telp = $_POST['no_telepon'];
            $alamat = $_POST['alamat'];
            $metode = $_POST['metode_pembayaran'];

            $_SESSION['metode_pembayaran'] = $metode;

            $order = new Order($conn);

            if ($order->saveCheckout($nama, $telp, $alamat)) {

                header("Location: success.php");
                exit();
            }
        }

        return $cart;
    }
}