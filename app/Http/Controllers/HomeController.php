<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HewanMasuk;
use App\Models\HewanKeluar; // Tambahkan model HewanKeluar

class HomeController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalHewanMasuk = HewanMasuk::count();
        $totalHewanKeluar = HewanKeluar::count(); // Hitung jumlah hewan keluar
        
        return view('home', compact('totalUsers', 'totalHewanMasuk', 'totalHewanKeluar'));
    }
}
