<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil item keranjang milik user yang sedang login
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get(); 
 
        // 1. Hitung subtotal (total harga barang) 
        $subtotal = $cartItems->sum('subtotal'); 
 
        // 2. Tentukan ongkir (untuk sekarang kita buat nilai tetap) 
        $ongkir = 10000; 
 
        // 3. Hitung total keseluruhan 
        $total = $subtotal + $ongkir; 
 
        // 4. Kirim semua variabel yang dibutuhkan ke view 
        return view('checkout.checkout', compact('cartItems', 'subtotal', 'ongkir', 'total'));
    }

    public function store(Request $request)
    {
        // 1. Validasi input form
        $request->validate([
            'nama_lengkap' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'metode_pembayaran' => 'required'
        ]);

        // 2. Ambil data keranjang user
        $userId = Auth::id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();

        // Jika keranjang kosong, jangan proses
        if ($cartItems->isEmpty()) {
            return redirect('/')->with('error', 'Keranjang Anda kosong!');
        }

        // 3. Hitung total harga
        $totalPrice = $cartItems->sum('subtotal');

        // 4. Gunakan transaction untuk memastikan semua proses berhasil
        $order = DB::transaction(function () use ($request, $userId, $cartItems, $totalPrice) {
            // 4a. Buat order baru di tabel 'orders'
            $order = Order::create([
                'user_id' => $userId,
                'nama_lengkap' => $request->nama_lengkap,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'metode_pembayaran' => $request->metode_pembayaran,
                'total_price' => $totalPrice,
            ]);

            // 4b. Pindahkan setiap item dari keranjang ke tabel 'order_items'
            foreach ($cartItems as $item) {
                $order->items()->create([ // 'items' adalah nama relasi yang akan kita buat
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'price' => $item->product->price, // Simpan harga saat itu
                ]);
            }

            // 4c. Kosongkan keranjang user setelah checkout berhasil
            Cart::where('user_id', $userId)->delete();

            return $order;
        });

        // 5. Redirect ke halaman sukses
        return redirect('/success')
            ->with('success_message', 'Pesanan Anda berhasil dibuat!')
            ->with('order_id', $order->id); // Kirim ID pesanan ke halaman sukses
    }
}