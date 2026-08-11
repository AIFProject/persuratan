<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends model {
    use HasFactory;

    protected $table = 'disposisi';
    protected $fillable = [
        'surat_masuk_id', 
        'tujuan_disposisi', 
        'isi_disposisi',
        'tanggal_disposisi',
        'sifat_surat', 
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_disposisi' => 'date',
    ];

    public function suratMasuk() {
        return $this->belongsTo(SuratMasuk::class, 'surat_masuk_id');
    }
}