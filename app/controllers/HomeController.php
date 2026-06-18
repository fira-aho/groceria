<?php
require_once __DIR__ . '/../models/Product.php';

class HomeController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function index() {
        $productModel = new Product($this->conn);
        $products = $productModel->getRecommendations();

        require_once __DIR__ . '/../views/home/index.php';
    }
}