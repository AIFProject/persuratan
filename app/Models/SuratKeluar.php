<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = [
        'nomor_surat', 'tanggal_surat', 'tujuan', 'perihal',
        'sifat_surat', 'file_surat', 'keterangan',
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
    ];
}
