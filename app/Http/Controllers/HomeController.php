<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Disposisi;
use App\Models\SuratKeputusan;

class HomeController extends Controller
{
    public function index()
    {
        $totalMasuk = SuratMasuk::count();
        $totalKeluar = SuratKeluar::count();
        $totalDisposisi = Disposisi::count();
        $totalSK = SuratKeputusan::count();
        $totalMasukTerbaru = SuratMasuk::latest()->take(5)->get();
        $totalKeluarTerbaru = SuratKeluar::latest()->take(5)->get();
        $totalSKTerbaru = SuratKeputusan::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalMasuk',
            'totalKeluar', 
            'totalDisposisi',
            'totalSK',
            'totalMasukTerbaru', 
            'totalKeluarTerbaru',
            'totalSKTerbaru'
        ));
    }
}
