<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DisposisiController;
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
});
