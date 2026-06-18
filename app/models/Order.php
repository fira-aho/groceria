<?php

class Order
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function saveCheckout($nama, $telp, $alamat)
    {
        $query = "INSERT INTO checkout (
                    nama_lengkap,
                    no_telepon,
                    alamat
                  ) VALUES (
                    '$nama',
                    '$telp',
                    '$alamat'
                  )";

        return mysqli_query($this->conn, $query);
    }
}