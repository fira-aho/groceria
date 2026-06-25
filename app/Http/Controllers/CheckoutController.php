<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = [];

        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        Order::create([
            'nama_lengkap' => $request->nama_lengkap,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat
        ]);

        return redirect('/success');
    }
}