<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HewanMasuk extends Model
{
    use HasFactory;

    // Nama tabel (jika berbeda dari konvensi)
    protected $table = 'hewan_masuk';

    // Atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'tanggal_masuk', 
        'jenis_hewan', 
        'asal_hewan', 
        'kondisi_kesehatan', 
        'pemilik_pengantar', 
        'keterangan', 
        'dokumen'
    ];
    

    // Casting tipe atribut
    protected $casts = [
        'tanggal_masuk' => 'datetime',
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
