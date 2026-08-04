<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip';

    protected $fillable = [

        'surat_masuk_id',
        'surat_keluar_id',

        'nama_file',
        'mime_type',
        'ukuran_file',

        'google_drive_id',
        'google_drive_link',

        'uploaded_by',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }

    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
