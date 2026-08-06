<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratKeputusanController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('surat-masuk', SuratMasukController::class);
    Route::get('surat-masuk/{surat_masuk}/download', [SuratMasukController::class, 'download'])->name('surat-masuk.download');
    Route::resource('surat-keluar', SuratKeluarController::class);
    Route::get('surat-keluar/{surat_keluar}/download', [SuratKeluarController::class, 'download'])->name('surat-keluar.download');
    Route::resource('disposisi', DisposisiController::class);
    Route::resource('arsip', ArsipController::class);
    Route::post('arsip/{arsip}/upload', [ArsipController::class, 'upload'])->name('arsip.upload');
    Route::get('arsip/{arsip}/download', [ArsipController::class, 'download'])->name('arsip.download');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/surat-masuk', [LaporanController::class, 'cetakSuratMasuk'])->name('laporan.surat-masuk');
    Route::get('/laporan/surat-keluar', [LaporanController::class, 'cetakSuratKeluar'])->name('laporan.surat-keluar');
    Route::get('/google/auth', [GoogleDriveController::class, 'redirect'])
        ->name('google.auth');
    Route::resource('surat-keputusan', SuratKeputusanController::class);
    Route::get('surat-keputusan/{suratKeputusan}/download', [SuratKeputusanController::class, 'download'])->name('surat-keputusan.download');
    Route::get('/disposii/{disposisi}/cetak-docx', [DisposisiController::class, 'cetakDocx'])->name('disposisi.cetak');
});
