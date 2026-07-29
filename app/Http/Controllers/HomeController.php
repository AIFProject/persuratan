<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Disposisi;

class HomeController extends Controller
{
    public function index()
    {
        $totalMasuk = SuratMasuk::count();
        $totalKeluar = SuratKeluar::count();
        $totalDisposisi = Disposisi::count();
        $totalMasukTerbaru = SuratMasuk::latest()->take(5)->get();
        $totalKeluarTerbaru = SuratKeluar::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalMasuk','totalKeluar', 'totalDisposisi',
            'totalMasukTerbaru', 'totalKeluarTerbaru'
        ));
    }
}
