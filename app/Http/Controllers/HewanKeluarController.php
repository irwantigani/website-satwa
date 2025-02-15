<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Exports\ExportHewanKeluar;
use Maatwebsite\Excel\Facades\Excel;


use App\Models\HewanKeluar;

class HewanKeluarController extends Controller
{
    public function index()
    {
        $hewan_keluar = HewanKeluar::all()->map(function ($item) {
            $item->tanggal_masuk = Carbon::parse($item->tanggal_masuk);
            return $item;
        });
        return view('hewan_keluar.index', compact('hewan_keluar'));
    }
    public function create()
    {
        // Logika jika diperlukan, misalnya data dropdown
        return view('hewan_keluar.create');
    }
    public function edit($id)
{
    $data = HewanKeluar::findOrFail($id);
    return view('hewan_keluar.edit', compact('data'));
}

public function destroy($id)
{
    $hewan = HewanKeluar::findOrFail($id);
    $hewan->delete();

    return redirect()->route('hewan_keluar.index')->with('success', 'Data berhasil dihapus.');
}
public function store(Request $request)
{
    // Validasi data
    $validatedData = $request->validate([
        'tanggal_keluar' => 'required|date',
        'jenis_hewan' => 'required|string|max:255',
        'asal_hewan' => 'required|string|max:255',
        'kondisi_kesehatan' => 'required|string|max:255',
        'pemilik_pengantar' => 'required|string|max:255',
        'keterangan' => 'nullable|string|max:255',
        'dokumen' => 'nullable|file|mimes:pdf,word,jpg,jpeg,png|max:2048',
    ]);

    // Simpan file dokumen jika ada
    if ($request->hasFile('dokumen')) {
        $file = $request->file('dokumen');
        $path = $file->store('dokumen', 'public');
        $validatedData['dokumen'] = $path;
    }

    // Simpan data ke database
    $hewanKeluar = HewanKeluar::create($validatedData);

    return redirect()->route('hewan_keluar.index')->with('success', 'Data Hewan keluar berhasil disimpan.');
}

public function update(Request $request, $id)
{
    $data = HewanKeluar::findOrFail($id);

    $validatedData = $request->validate([
        'jenis_hewan' => 'required|string|max:255',
        'asal_hewan' => 'required|string|max:255',
        'kondisi_kesehatan' => 'required|string|max:255',
        'tanggal_keluar' => 'required|date',
        'pemilik_pengantar' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'dokumen' => 'nullable|file|mimes:pdf,word,jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('dokumen')) {
        // Hapus dokumen lama jika ada
        if ($data->dokumen) {
            Storage::delete('public/' . $data->dokumen);
        }
        $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen', 'public');
    }

    $data->update($validatedData);

    return redirect()->route('hewan_keluar.index')->with('success', 'Data berhasil diperbarui.');
}


public function exportHewanKeluar()
{
    return Excel::download(new ExportHewanKeluar, 'hewan_keluar.xlsx');
}
}
