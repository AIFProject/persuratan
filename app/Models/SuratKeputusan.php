<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeputusan extends Model
{
    use HasFactory;

    protected $table = 'surat_keputusan';

    protected $fillable = [
        'nomor_sk',
        'nama_sk',
        'tanggal',
        'perihal',
        'file_sk',
        'google_drive_id',
        'google_drive_url',
        'created_by',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
