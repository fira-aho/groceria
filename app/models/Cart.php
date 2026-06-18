<?php

class Cart
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Ambil semua cart
    public function getCart()
    {
        $query = "SELECT * FROM cart";

        return mysqli_query($this->conn, $query);
    }

    // Update quantity
    public function updateQty($id, $qty)
    {
        $query = "UPDATE cart
                  SET qty = $qty,
                  subtotal = price * $qty
                  WHERE id = $id";

        return mysqli_query($this->conn, $query);
    }

    // Hapus item
    public function deleteItem($id)
    {
        $query = "DELETE FROM cart
                  WHERE id = $id";

        return mysqli_query($this->conn, $query);
    }

    // Hitung jumlah item
    public function countCart()
    {
        $query = "SELECT COUNT(*) as count
                  FROM cart";

        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_assoc($result);
    }
}