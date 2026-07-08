<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function index()
    {
        $metode = session('metode_pembayaran');
        $subtotal = session('subtotal');
        $grandTotal = session('grandTotal');

        return view('success.success', compact(
            'metode',
            'subtotal',
            'grandTotal'
        ));
    }
}