<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Tampilkan semua produk di halaman home
    public function index()
    {
        $products = DB::table('products')->get()->toArray();
        $products = array_map(fn($p) => (array) $p, $products);

        return view('home', compact('products'));
    }

    // Tampilkan detail produk
    public function detail($id)
    {
        $product = DB::table('products')
            ->select(
                'id',
                'name as nama_produk',
                'price as harga',
                'image as gambar'
            )
            ->where('id', $id)
            ->first();

        return view('product_detail', compact('product'));
    }

    // Tampilkan produk berdasarkan kategori
    public function category($category)
    {
        $products = DB::table('products')
                    ->where('category', $category)
                    ->get()->toArray();

        $products = array_map(fn($p) => (array) $p, $products);

        return view('category', compact('products', 'category'));
    }
}