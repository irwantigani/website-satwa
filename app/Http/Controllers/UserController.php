<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\RegistersUsers; // Pastikan ini ada
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua data user
        return view('auth.index', compact('users'));
    }
    
    public function edit($id)
    {
        // Cari user berdasarkan id
        $user = User::findOrFail($id); 
    
        // Kirim data user ke view
        return view('auth.edit', compact('user'));
    }

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('auth.index')->with('success', 'Data berhasil dihapus.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:6',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;

    // Perbarui password jika diisi
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('auth.index')->with('success', 'User berhasil diperbarui.');
}

public function register()
{
    // Cari user berdasarkan id
    $users = User::all(); // Ambil semua data user

    // Kirim data user ke view
    return view('auth.register', compact('users'));
}

}
