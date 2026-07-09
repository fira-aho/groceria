<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function index()
    {
        // Ambil order_id dari session yang dikirim oleh CheckoutController
        $orderId = session('order_id'); 
        
        // Jika tidak ada order_id di session, kembalikan ke halaman utama
        if (!$orderId) {
            return redirect('/');
        }

        // Ambil data order lengkap dari database
        $order = Order::findOrFail($orderId);
        return view('success.success', compact('order'));
    }
}