<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah pengguna sudah login DAN memiliki jabatan 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Silakan lewat
            return $next($request);
        }

        // Jika dia customer biasa, tendang kembali ke halaman beranda
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman Admin!');
    }
}