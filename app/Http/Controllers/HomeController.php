<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('products_recomendations')->get()->toArray();
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
}