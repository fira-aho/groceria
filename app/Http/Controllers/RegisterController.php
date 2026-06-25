<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Otomatis
        $request->validate([
            'name' => 'required|string|max:255',
            // unique:users,email akan otomatis mengecek apakah email sudah ada di tabel users
            'email' => 'required|email|unique:users,email', 
            // same:confirm_password memastikan input password sama dengan konfirmasi
            'password' => 'required|min:6|same:confirm_password', 
        ], [
            // Pesan error kustom (opsional)
            'email.unique' => 'Email sudah digunakan!',
            'password.same' => 'Konfirmasi password tidak sesuai!'
        ]);

        // 2. Simpan Data ke Database
        User::create([
            'name' => $request->name, // <-- Sesuaikan bagian kirinya saja
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        // 3. Redirect ke halaman login dengan membawa pesan sukses
        return redirect('/login')->with('success', 'Register berhasil!');
    }
}