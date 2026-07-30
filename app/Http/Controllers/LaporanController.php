<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller {
    public function index() {
        return view('laporan.index');
    }

    public function cetakSuratMasuk(Request $request) {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start = $request->start_date;
        $end = $request->end_date;

        $suratMasuk = SuratMasuk::whereBetween('tanggal_surat', [$start, $end])
                    ->orderBy('tanggal_surat')
                    ->get();
        $pdf = Pdf::loadView('laporan.surat_masuk_pdf', compact('suratMasuk', 'start', 'end'));
        return $pdf->download("Laporan-surat-masuk-{$start}-{$end}.pdf");
    }

    public function cetakSuratKeluar(Request $request) {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start = $request->start_date;
        $end = $request->end_date;

        $suratKeluar = SuratKeluar::whereBetween('tanggal_surat', [$start, $end])
                    ->orderBy('tanggal_surat')
                    ->get();
        $pdf = Pdf::loadView('Laporan.surat_keluar_pdf', compact('suratKeluar'  , 'start', 'end'));
        return $pdf->download("Laporan-surat-keluar-{$start}-{$end}.pdf");
    }
}
