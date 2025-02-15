<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman registrasi
    public function register()
    {
        return view('auth.register'); // Pastikan file view ini ada di resources/views/auth/register.blade.php
    }

    // Menangani proses registrasi
    public function store(Request $request)
    {
        // Validasi data registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Memastikan password dan konfirmasi cocok
        ]);

        // Menyimpan data pengguna ke dalam database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Enkripsi password
        ]);

        // Setelah sukses, arahkan pengguna ke halaman login atau halaman lain
        return redirect()->route('login')->with('success', 'Account created successfully');
    }
}
