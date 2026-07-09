<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PDF; // Gunakan alias yang terdaftar secara global
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    // Terima $order sebagai parameter dari route
    public function generate(Order $order)
    {
        // Pastikan user yang login adalah pemilik order ini
        if (Auth::id() !== $order->user_id) {
            abort(403, 'Unauthorized action.');
        }
        
        // Ambil item-item yang berelasi dengan order ini
        $orderItems = $order->items()->with('product')->get();
        
        // Ambil subtotal dari data order yang sudah tersimpan
        $subtotal = $order->total_price;
        
        // Tentukan ongkir (bisa dibuat dinamis nanti)
        $ongkir = 15000;
        
        $grandTotal = $subtotal + $ongkir;
        
        $pdf = PDF::loadView('invoice.invoice', compact('order', 'orderItems',
            'subtotal',
            'ongkir',
            'grandTotal'
        ));
        
        // Buat nama file dinamis berdasarkan ID order
        return $pdf->download('Invoice-Groceria-' . $order->id . '.pdf');
    }
}