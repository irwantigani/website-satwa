<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\ExportHewanMasuk;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\HewanMasuk;

class HewanMasukController extends Controller
{
    public function index()
    {
        $hewan_masuk = HewanMasuk::all()->map(function ($item) {
            $item->tanggal_masuk = Carbon::parse($item->tanggal_keluar);
            return $item;
        });
        return view('hewan_masuk.index', compact('hewan_masuk'));
    }
    
    public function create()
    {
        // Logika jika diperlukan, misalnya data dropdown
        return view('hewan_masuk.create');
    }
    public function edit($id)
{
    $data = HewanMasuk::findOrFail($id);
    return view('hewan_masuk.edit', compact('data'));
}

public function destroy($id)
{
    $hewan = HewanMasuk::findOrFail($id);
    $hewan->delete();

    return redirect()->route('hewan_masuk.index')->with('success', 'Data berhasil dihapus.');
}
public function store(Request $request)
{
    $request->validate([
        'jenis_hewan' => 'required|string|max:255',
        'asal_hewan' => 'required|string|max:255',
        'kondisi_kesehatan' => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'pemilik_pengantar' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // Simpan file dokumen jika ada
    $filePath = null;
    if ($request->hasFile('dokumen')) {
        $filePath = $request->file('dokumen')->store('dokumen', 'public');
    }

    // Simpan data ke database
    HewanMasuk::create([
        'jenis_hewan' => $request->jenis_hewan,
        'asal_hewan' => $request->asal_hewan,
        'kondisi_kesehatan' => $request->kondisi_kesehatan,
        'tanggal_masuk' => $request->tanggal_masuk,
        'pemilik_pengantar' => $request->pemilik_pengantar,
        'keterangan' => $request->keterangan,
        'dokumen' => $filePath,
    ]);

    return redirect()->route('hewan_masuk.index')->with('success', 'Data berhasil disimpan.');
}
public function update(Request $request, $id)
{
    $data = HewanMasuk::findOrFail($id);

    $validatedData = $request->validate([
        'jenis_hewan' => 'required|string|max:255',
        'asal_hewan' => 'required|string|max:255',
        'kondisi_kesehatan' => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
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

    return redirect()->route('hewan_masuk.index')->with('success', 'Data berhasil diperbarui.');
}
public function exportHewanMasuk()
    {
        return Excel::download(new ExportHewanMasuk, 'hewan_masuk.xlsx');
    }

}
