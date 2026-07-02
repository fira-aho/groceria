<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data cart beserta data produk relasinya
        $cartItems = Cart::with('product')->get();

        if ($cartItems->isEmpty()) {
            return view('cart.empty');
        }

        // 2. Kumpulkan ID produk apa saja yang sudah masuk ke keranjang
        $cartProductIds = $cartItems->pluck('product_id')->toArray();

        // 3. Ambil produk dari database yang ID-nya TIDAK ADA di keranjang (batas 6 item)
        $recommendations = \App\Models\Product::whereNotIn('id', $cartProductIds)->limit(6)->get();

        // 4. Kirim data cart DAN data rekomendasi ke view
        return view('cart.index', compact('cartItems', 'recommendations'));
    }

    public function updateQty(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'qty' => 'required|integer',
            'action' => 'required|string|in:update_qty'
        ]);

        $cartItem = Cart::find($request->id);

        if ($cartItem) {
            if ($request->qty > 0) {
                // Ambil harga dari tabel products lewat relasi
                $hargaProduk = $cartItem->product->price; 
                
                $cartItem->update([
                    'qty' => $request->qty,
                    'subtotal' => $hargaProduk * $request->qty
                ]);
            } else {
                $cartItem->delete();
            }
        }

        $count = Cart::count();

        return response()->json([
            'status' => 'success',
            'is_empty' => ($count === 0)
        ]);
    }
    
    public function store(Request $request)
    {
    $request->validate([
        'product_id' => 'required|integer|exists:products,id',
        'qty' => 'nullable|integer|min:1',
    ]);

    $qty = $request->qty ?? 1;
    $product = Product::findOrFail($request->product_id);

    $cartItem = Cart::where('product_id', $product->id)->first();

    if ($cartItem) {
        $newQty = $cartItem->qty + $qty;
        $cartItem->update([
            'qty' => $newQty,
            'subtotal' => $newQty * $product->price,
        ]);
    } else {
        Cart::create([
            'product_id' => $product->id,
            'qty' => $qty,
            'subtotal' => $product->price * $qty,
        ]);
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Produk ditambahkan ke keranjang',
        'cart_count' => Cart::count(),
    ]);
    }   
}