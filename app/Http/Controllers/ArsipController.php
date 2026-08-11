<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
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
                NULL as file_surat,
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
        $union = $keluar->unionAll($masuk);

        $results = DB::query()
            ->fromSub($union, 'arsip')
            ->orderByDesc('tanggal')
            ->paginate(10)
            ->withQueryString();

        return view('arsip.index', compact('results', 'filters'));
    }

    public function create()
    {
        $suratMasuk = SuratMasuk::doesntHave('arsip')->get();
        $suratKeluar = SuratKeluar::doesntHave('arsip')->get();

        return view('arsip.create', compact(
            'suratMasuk',
            'suratKeluar'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);
        $file = $request->file('file');
        $path = $file->store('arsip', 'public');
        Arsip::create([
            'surat_masuk_id' => $request->jenis == 'masuk' ? $request->surat_id : null,
            'surat_keluar_id' => $request->jenis == 'keluar' ? $request->surat_id : null,
            'nama_file' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'ukuran_file' => $file->getSize(),
            'uploaded_by' => auth()->id(),
        ]);

        return redirect()
            ->route('arsip.index')
            ->with(
                'success',
                'Arsip berhasil ditambahkan.'
            );
    }

    public function download(Arsip $arsip)
    {
        return Storage::disk('public')
            ->download(
                'arsip/'.$arsip->nama_file
            );
    }
}
