<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = [];

        return view('checkout.checkout', compact('cart'));
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

        session([
            'metode_pembayaran' => $request->metode_pembayaran
        ]);

        return redirect('/success');
    }
}