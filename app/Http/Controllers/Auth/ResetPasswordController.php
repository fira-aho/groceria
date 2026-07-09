<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | Controller ini bertanggung jawab untuk menangani permintaan reset password
    | dan menggunakan trait sederhana untuk menyertakan perilaku ini. Anda bebas
    | untuk menjelajahi trait ini dan menimpa metode apa pun yang ingin Anda sesuaikan.
    |
    */

    use ResetsPasswords;

    /**
     * Ke mana harus mengarahkan pengguna setelah password mereka di-reset.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Menampilkan halaman form reset password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('auth.reset-password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
