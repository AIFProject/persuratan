<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['nomor_surat', 'pengirim', 'tujuan', 'perihal', 'bulan', 'tahun']);

        $masuk = DB::table('surat_masuk')
            ->selectRaw("
                id,
                nomor_surat,
                tanggal_surat as tanggal,
                pengirim as asal_tujuan,
                perihal,
                file_surat,
                'masuk' as jenis
            ")
            ->when($filters['nomor_surat'] ?? null, function ($q, $val) {
                $q->where('nomor_surat', 'like', "%{$val}%");
            })
            ->when($filters['pengirim'] ?? null, function ($q, $val) {
                $q->where('pengirim', 'like', "%{$val}%");
            })
            ->when($filters['perihal'] ?? null, function ($q, $val) {
                $q->where('perihal', 'like', "%{$val}%");
            })
            ->when($filters['bulan'] ?? null, function ($q, $val) {
                $q->whereMonth('tanggal_surat', $val);
            })
            ->when($filters['tahun'] ?? null, function ($q, $val) {
                $q->whereYear('tanggal_surat', $val);
            });

        // Subquery Surat Keluar
        $keluar = DB::table('surat_keluar')
            ->selectRaw("
                id,
                nomor_surat,
                tanggal_surat as tanggal,
                tujuan as asal_tujuan,
                perihal,
                file_surat,
                'keluar' as jenis
            ")
            ->when($filters['nomor_surat'] ?? null, function ($q, $val) {
                $q->where('nomor_surat', 'like', "%{$val}%");
            })
            ->when($filters['tujuan'] ?? null, function ($q, $val) {
                $q->where('tujuan', 'like', "%{$val}%");
            })
            ->when($filters['perihal'] ?? null, function ($q, $val) {
                $q->where('perihal', 'like', "%{$val}%");
            })
            ->when($filters['bulan'] ?? null, function ($q, $val) {
                $q->whereMonth('tanggal_surat', $val);
            })
            ->when($filters['tahun'] ?? null, function ($q, $val) {
                $q->whereYear('tanggal_surat', $val);
            });

        // Union dan paginate
        $results = $keluar->unionAll($masuk)
            ->orderBy('tanggal', 'desc')
            ->paginate(20)
            ->withQueryString();

        return view('arsip.index', compact('results', 'filters'));
    }
}
