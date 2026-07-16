<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total pendapatan dari pesanan yang sudah 'selesai'
        $totalPendapatan = Order::where('status', 'selesai')->sum('total_price');
        
        // Hitung total semua pesanan masuk
        $totalPesanan = Order::count();
        
        // Hitung total pengguna (asumsi role pelanggan adalah 'user')
        // Sesuaikan 'role' dengan struktur database-mu jika berbeda
        $totalPelanggan = User::where('role', 'user')->count();
        
        // Ambil produk yang stoknya tersisa 10 atau kurang
        $stokMenipis = Product::where('stock', '<=', 10)->get();

        return view('admin.dashboard', compact(
            'totalPendapatan', 
            'totalPesanan', 
            'totalPelanggan', 
            'stokMenipis'
        ));
    }
}