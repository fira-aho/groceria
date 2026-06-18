<?php

include __DIR__ . "/../config/database.php";

/** @var mysqli $conn */

include __DIR__ . "/../models/Cart.php";

$cart = new Cart($conn);


// =========================
// AJAX UPDATE QTY
// =========================
if (
    $_SERVER["REQUEST_METHOD"] == "POST"
    &&
    isset($_POST['action'])
    &&
    $_POST['action'] == 'update_qty'
) {

    $id = intval($_POST['id']);
    $qty = intval($_POST['qty']);

    if ($qty > 0) {

        $cart->updateQty($id, $qty);

    } else {

        $cart->deleteItem($id);

    }

    $dataCart = $cart->countCart();

    echo json_encode([
        'status' => 'success',
        'is_empty' => ($dataCart['count'] == 0)
    ]);

    exit;
}


// =========================
// AMBIL DATA CART
// =========================
$result = $cart->getCart();


// Cek jika query gagal dieksekusi (misal tabel dihapus)
if (!$result) {
    die("Query Database Error: " . mysqli_error($conn));
}

// =========================
// CART KOSONG
// =========================
if (mysqli_num_rows($result) == 0) {

    header("Location: empty.php");

    exit;
}