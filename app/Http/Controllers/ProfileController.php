<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }
}
