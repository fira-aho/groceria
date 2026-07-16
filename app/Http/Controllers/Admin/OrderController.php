<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Tarik semua data pesanan dari yang terbaru, beri jarak 10 baris per halaman
        $orders = Order::latest()->paginate(10);
        
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        // Tarik detail pesanan beserta relasi item produknya
        $order = Order::with('items.product')->findOrFail($id);
        
        return view('admin.orders.show', compact('order'));
    }
}