<?php
session_start();
require_once '../app/config/database.php';

/** @var mysqli $conn */

require_once '../app/controllers/HomeController.php';

$controller = new HomeController($conn);
$controller->index();