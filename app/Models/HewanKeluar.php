<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HewanKeluar extends Model
{
    use HasFactory;
    protected $table = 'hewan_keluar';

    protected $fillable = [
        'tanggal_keluar', 
        'jenis_hewan', 
        'asal_hewan', 
        'kondisi_kesehatan', 
        'pemilik_pengantar', 
        'keterangan', 
        'dokumen'
    ];

    // Casting tipe atribut
    protected $casts = [
        'tanggal_keluar' => 'datetime',
    ];

    // Matikan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;

    // Accessor untuk dokumen (opsional, jika ada penyimpanan khusus)
    public function getDokumenUrlAttribute()
    {
        if ($this->dokumen) {
            return asset('storage/dokumen/' . $this->dokumen);
        }
        return null;
    }
}
