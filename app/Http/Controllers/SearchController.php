<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index(Request $request)
{
    $query = Product::query();

    if ($request->filled('category')) {

        $query->where('category', $request->category);

    }

    $products = $query->get();

    return view('search.search', compact('products'));
}
}