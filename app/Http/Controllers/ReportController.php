<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HewanMasuk;
use App\Models\HewanKeluar;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        // Ambil data Hewan Masuk (Hanya 30 hari terakhir untuk optimasi)
        $hewanMasuk = HewanMasuk::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->where('created_at', '>=', Carbon::now()->subDays(30))
                        ->groupBy('date')
                        ->orderBy('date', 'ASC')
                        ->get();

        // Ambil data Hewan Keluar (Hanya 30 hari terakhir untuk optimasi)
        $hewanKeluar = HewanKeluar::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                        ->where('created_at', '>=', Carbon::now()->subDays(30))
                        ->groupBy('date')
                        ->orderBy('date', 'ASC')
                        ->get();

        // Format data untuk chart
        $hewanMasukData = [
            'dates' => $hewanMasuk->pluck('date')->toArray(),
            'counts' => $hewanMasuk->pluck('count')->toArray()
        ];

        $hewanKeluarData = [
            'dates' => $hewanKeluar->pluck('date')->toArray(),
            'counts' => $hewanKeluar->pluck('count')->toArray()
        ];

        // Debugging untuk cek apakah data kosong atau tidak
        if (empty($hewanMasukData['dates']) || empty($hewanKeluarData['dates'])) {
            return back()->with('error', 'Data Hewan Masuk atau Hewan Keluar tidak tersedia');
        }

        return view('reports.index', compact('hewanMasukData', 'hewanKeluarData'));
    }
}
