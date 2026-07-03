<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Kita pakai teks sederhana dulu untuk menguji apakah rutenya aman
        return "Selamat datang di Dapur Utama Groceria, Admin!";
    }
}