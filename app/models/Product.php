<?php

class Product {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getRecommendations() {
        $query = mysqli_query($this->conn, "SELECT * FROM products_recomendations");

        $products = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $products[] = $row;
        }

        return $products;
    }
}