<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Menampilkan halaman profil user yang sedang login
    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }

    // Memproses pergantian password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru minimal harus 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = auth()->user();

        // Validasi apakah password lama cocok dengan yang tersimpan di database
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama salah.']);
        }

        // Simpan password baru dengan Hash::make()
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Password berhasil diubah.');
    }
}