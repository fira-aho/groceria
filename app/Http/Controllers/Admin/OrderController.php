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

    public function print()
    {
        // Ambil semua pesanan yang sudah selesai untuk masuk ke laporan pendapatan
        $orders = Order::where('status', 'selesai')->orderBy('created_at', 'desc')->get();
        $totalPendapatan = $orders->sum('total_price');

        return view('admin.orders.print', compact('orders', 'totalPendapatan'));
    }

    public function show($id)
    {
        // Tarik detail pesanan beserta relasi item produknya
        $order = Order::with('items.product')->findOrFail($id);
        
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,diproses,dikirim,selesai,dibatalkan'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}