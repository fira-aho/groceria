<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        // 1. Validasi format input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Coba lakukan login (Laravel otomatis mencocokkan email & password yang di-hash)
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan dari serangan session fixation
            $request->session()->regenerate();

            // Alihkan ke halaman cart (atau halaman utama) setelah berhasil login
            return redirect()->intended('/')->with('success', 'Login berhasil!');
        }

        // 3. Jika gagal, kembali ke halaman login dengan membawa pesan error
        return back()->withErrors([
            'login_error' => 'Email atau password salah!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Hancurkan session lama dan buat token CSRF baru demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}