<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $fillable = [
        'nomor_surat', 
        'tanggal_surat', 
        'tanggal_diterima', 
        'pengirim',
        'perihal', 
        'sifat_surat', 
        'klasifikasi',
        'file_surat', 
        'keterangan'
    ];
    protected $casts = [
        'tanggal_surat' => 'date',
        'tanggal_diterima' => 'date',
    ];

    public function disposisi() {
        return $this->hasMany(Disposisi::class);
    }
}
