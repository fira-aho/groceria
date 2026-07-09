<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function generate()
    {
        $userId = Auth::id();

        $cartItems = Cart::with('product')
                    ->where('user_id', $userId)
                    ->get();

        $subtotal = $cartItems->sum('subtotal');

        $ongkir = 15000;

        $grandTotal = $subtotal + $ongkir;

        $pdf = Pdf::loadView('invoice.invoice', compact(
            'cartItems',
            'subtotal',
            'ongkir',
            'grandTotal'
        ));

        return $pdf->download('Invoice-Groceria.pdf');
    }
}