<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
    $products = DB::table('products_recomendations')
        ->join('products', 'products.id', '=', 'products_recomendations.product_id')
        ->select(
            'products.id',
            'products.name as nama_produk',
            'products.price as harga',
            'products.image as gambar',
            'products_recomendations.badge'
        )
        ->orderBy('products_recomendations.urutan')
        ->get()
        ->toArray();

    $products = array_map(fn($p) => (array) $p, $products);

    return view('home', compact('products'));
    }

    public function detail($id)
    {
    $product = DB::table('products_recomendations')
                ->where('id', $id)
                ->first();
    
    return view('product_detail', compact('product'));
    }

    public function profile()
    {
    // Ambil data user yang sedang login
    $user = auth()->user();

    // Kirim data user ke view profile
    return view('profile', compact('user'));
    }
}