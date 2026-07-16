<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Tarik semua data pengguna, urutkan dari yang terbaru
        $users = User::latest()->paginate(10);
        
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,user'
        ]);

        $user = User::findOrFail($id);
        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'Hak akses pengguna berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Opsional: Cegah admin menghapus dirinya sendiri
        if (auth()->id() == $user->id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Akun pengguna berhasil dihapus!');
    }
}