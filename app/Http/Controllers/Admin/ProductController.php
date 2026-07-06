<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product; // agar sistem mengenali data produk
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data produk dari database
        $products = Product::all();
        
        // Kirim datanya ke halaman HTML (view)
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Periksa kelengkapan dan format data (Validasi)
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Wajib gambar, maksimal 2MB
        ]);

        // 2. Siapkan nama unik untuk gambar agar tidak menimpa file lama
        $imageName = time() . '.' . $request->image->extension();  

        // 3. Pindahkan file gambar ke folder public/assets/img
        $request->image->move(public_path('assets/img'), $imageName);

        // 4. Simpan semua data ke database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imageName,
        ]);

        // 5. Tendang kembali admin ke halaman daftar produk setelah sukses
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);
        
        // Buka halaman formulir edit sambil membawa data produk tersebut
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi data yang masuk (gambar bersifat nullable/opsional)
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Cari data produk yang akan diedit
        $product = Product::findOrFail($id);

        // 3. Bungkus data teks yang pasti diubah
        $dataUpdate = [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ];

        // 4. Periksa apakah ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Cek dan hapus gambar fisik yang lama dari folder
            $oldImagePath = public_path('assets/img/' . $product->image);
            if (file_exists($oldImagePath) && $product->image != null) {
                @unlink($oldImagePath);
            }

            // Siapkan nama baru dan pindahkan gambar baru ke folder
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('assets/img'), $imageName);
            
            // Tambahkan nama gambar baru ke bungkusan data update
            $dataUpdate['image'] = $imageName;
        }

        // 5. Eksekusi pembaruan ke database
        $product->update($dataUpdate);

        // 6. Tendang kembali ke halaman daftar produk
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 1. Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // 2. Cek apakah file gambarnya ada di folder, lalu hapus file fisiknya
        $imagePath = public_path('assets/img/' . $product->image);
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }

        // 3. Hapus data produk dari database
        $product->delete();

        // 4. Kembalikan admin ke halaman daftar produk
        return redirect()->route('produk.index');
    }
}
