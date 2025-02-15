<?php

namespace App\Exports;

use App\Models\HewanMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportHewanMasuk implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Mengambil semua data dari model HewanMasuk
        return HewanMasuk::select('tanggal_masuk', 'jenis_hewan', 'asal_hewan', 'kondisi_kesehatan', 'pemilik_pengantar', 'keterangan','dokumen')
            ->get();
    }

    /**
    * Menentukan header kolom untuk file Excel
    *
    * @return array
    */
    public function headings(): array
    {
        return [
            'Tanggal Masuk',
            'Jenis Hewan',
            'Asal Hewan ',
            'Kondisi Kesehatan',
            'Pemilik',
            'Keterangan',
            'dokumen'
        ];
    }
}
