<?php

namespace App\Exports;

use App\Models\HewanKeluar; // Pastikan ini sesuai dengan model Anda
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportHewanKeluar implements FromCollection, WithHeadings
{
    /**
    * Mengambil data untuk diekspor ke Excel.
    *
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Mengambil data dari model HewanKeluar dengan kolom yang relevan
        return HewanKeluar::select(
            'tanggal_keluar', 
            'jenis_hewan', 
            'asal_hewan', 
            'kondisi_kesehatan', 
            'pemilik_pengantar', 
            'keterangan', 
            'dokumen'
        )->get();
    }

    /**
    * Menentukan header kolom untuk file Excel.
    *
    * @return array
    */
    public function headings(): array
    {
        return [
            'Tanggal Keluar',
            'Jenis Hewan',
            'Asal Hewan',
            'Kondisi Kesehatan',
            'Pemilik',
            'Keterangan',
            'Dokumen',
        ];
    }
}
