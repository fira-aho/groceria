<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
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

    use SendsPasswordResetEmails;

    // Mengarahkan ke view yang akan kita buat nanti
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }
}
