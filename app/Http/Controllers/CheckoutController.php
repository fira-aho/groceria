<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil ID user yang sedang login
        $userId = Auth::id();

        // Ambil semua isi keranjang beserta data produknya
        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        // Hitung subtotal
        $subtotal = $cartItems->sum('subtotal');

        // Ongkir
        $ongkir = $cartItems->isEmpty() ? 0 : 15000;

        // Total pembayaran
        $total = $subtotal + $ongkir;

        return view('checkout.checkout', compact(
            'cartItems',
            'subtotal',
            'ongkir',
            'total'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        Order::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat
        ]);

        $userId = Auth::id();

        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

        $subtotal = $cartItems->sum('subtotal');
        $ongkir = $cartItems->isEmpty() ? 0 : 15000;
        $grandTotal = $subtotal + $ongkir;

        session([
            'metode_pembayaran' => $request->metode_pembayaran,
            'subtotal' => $subtotal,
            'grandTotal' => $grandTotal,
        ]);

        return redirect()->route('success');
    }
}