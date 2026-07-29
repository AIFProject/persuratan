<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisposisiRequest;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index(Request $request)
    {
        $query = Disposisi::with('suratMasuk')->latest();

        // Filter opsional (contoh berdasarkan nomor surat)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('suratMasuk', function ($q) use ($search) {
                $q->where('nomor_surat', 'like', "%{$search}%")
                    ->orWhere('pengirim', 'like', "%{$search}%");
            })->orWhere('tujuan_disposisi', 'like', "%{$search}%");
        }

        $disposisi = $query->paginate(10)->withQueryString();

        return view('disposisi.index', compact('disposisi'));
    }

    public function create()
    {
        // Ambil daftar surat masuk untuk dropdown
        $suratMasukList = SuratMasuk::orderBy('tanggal_diterima', 'desc')->get();

        return view('disposisi.create', compact('suratMasukList'));
    }

    public function store(DisposisiRequest $request)
    {
        Disposisi::create($request->validated());

        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil ditambahkan.');
    }

    public function show(Disposisi $disposisi)
    {
        $disposisi->load('suratMasuk');

        return view('disposisi.show', compact('disposisi'));
    }

    public function edit(Disposisi $disposisi)
    {
        $suratMasukList = SuratMasuk::orderBy('tanggal_diterima', 'desc')->get();

        return view('disposisi.edit', compact('disposisi', 'suratMasukList'));
    }

    public function update(DisposisiRequest $request, Disposisi $disposisi)
    {
        $disposisi->update($request->validated());

        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil diperbarui.');
    }

    public function destroy(Disposisi $disposisi)
    {
        $disposisi->delete();

        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil dihapus.');
    }
}
