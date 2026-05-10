<?php
session_start();

// Hapus semua session
session_destroy();

// Kembali ke homepage
header("Location: ../index.php");
exit;
?>