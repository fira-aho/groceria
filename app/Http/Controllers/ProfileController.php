<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Tampilkan halaman profile
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Update data profile
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'name'       => 'required|string|max:255',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string',
            'birth_date' => 'nullable|date',
            'gender'     => 'nullable|in:Laki-laki,Perempuan',
            'avatar'     => 'nullable|image|max:2048',
        ]);

        // Update data biasa
        $user->name       = $request->name;
        $user->phone      = $request->phone;
        $user->address    = $request->address;
        $user->birth_date = $request->birth_date;
        $user->gender     = $request->gender;

        // Upload foto profil kalau ada
    if ($request->hasFile('avatar')) {
        // Hapus foto lama kalau ada
        if ($user->avatar) {
            Storage::delete('public/avatars/' . $user->avatar);
        }
        $filename = time() . '.' . $request->avatar->getClientOriginalExtension();
        $request->avatar->move(storage_path('app/public/avatars'), $filename);
        $user->avatar = $filename;
    }

        $user->save();

        return redirect('/profile')->with('success', 'Profile berhasil diupdate!');
    }

    // Ganti password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Cek apakah password lama benar
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah!']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/profile')->with('success', 'Password berhasil diubah!');
    }
}