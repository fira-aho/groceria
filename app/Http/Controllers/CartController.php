<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahan wajib untuk memanggil session user

class CartController extends Controller
{
    public function index()
    {
        // Ambil ID pelanggan yang sedang login
        $userId = Auth::id();

        // 1. Ambil data cart beserta produk relasinya, KHUSUS untuk user yang sedang login
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return view('cart.empty');
        }

        // 2. Kumpulkan ID produk apa saja yang sudah masuk ke keranjang user ini
        $cartProductIds = $cartItems->pluck('product_id')->toArray();

        // 3. Ambil produk dari database yang ID-nya TIDAK ADA di keranjang (batas 6 item)
        $recommendations = Product::whereNotIn('id', $cartProductIds)->limit(6)->get();

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

        // Cari item keranjang yang sesuai dengan ID dari request
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

        // Hitung sisa barang di keranjang KHUSUS untuk user ini
        $count = Cart::where('user_id', Auth::id())->count();

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

        $userId = Auth::id(); // Tangkap ID user yang sedang login
        $qty = $request->qty ?? 1;
        $product = Product::findOrFail($request->product_id);

        // Cek apakah produk ini sudah ada di keranjang MILIK USER INI
        $cartItem = Cart::where('product_id', $product->id)
                        ->where('user_id', $userId)
                        ->first();

        if ($cartItem) {
            $newQty = $cartItem->qty + $qty;
            $cartItem->update([
                'qty' => $newQty,
                'subtotal' => $newQty * $product->price,
            ]);
        } else {
            // Jika belum ada, buat baru dan rekam user_id-nya
            Cart::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'qty' => $qty,
                'subtotal' => $product->price * $qty,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Produk ditambahkan ke keranjang',
            'cart_count' => Cart::where('user_id', $userId)->count(), // Hitung keranjang spesifik user ini
        ]);
    }   
}