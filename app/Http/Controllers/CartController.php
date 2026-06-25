<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel cart
        $cartItems = Cart::all();

        // Jika kosong, arahkan ke halaman khusus cart kosong
        if ($cartItems->isEmpty()) {
            return view('cart.empty');
        }

        // Jika ada isinya, kirim data ke view utama cart
        return view('cart.index', compact('cartItems'));
    }

    public function updateQty(Request $request)
    {
        // Validasi data kiriman AJAX
        $request->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer',
        ]);

        $cartItem = Cart::find($request->id);

        if ($cartItem) {
            if ($request->qty > 0) {
                // Update kuantitas dan hitung subtotal baru
                $cartItem->update([
                    'qty' => $request->qty,
                    'subtotal' => $cartItem->price * $request->qty
                ]);
            } else {
                // Hapus item jika kuantitasnya diubah ke 0 atau minus
                $cartItem->delete();
            }
        }

        // Hitung total baris data yang tersisa di tabel cart
        $totalSisa = Cart::count();

        return response()->json([
            'status' => 'success',
            'is_empty' => ($totalSisa === 0)
        ]);
    }
}