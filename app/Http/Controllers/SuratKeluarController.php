<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratKeluarRequest;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratKeluar::latest();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nomor_surat', 'like', "%{$search}%")
                    ->orWhere('tujuan', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }
        $suratKeluar = $query->paginate(10)->withQueryString();

        return view('surat_keluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        return view('surat_keluar.create');
    }

    public function store(SuratKeluarRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('file_surat')) {
            $data['file_surat'] = $request->file('file_surat')->store('surat_keluar', 'public');
        }
        SuratKeluar::create($data);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    public function show(SuratKeluar $suratKeluar)
    {
        return view('surat_keluar.show', compact('suratKeluar'));
    }

    public function edit($id)
    {
        return view('surat_keluar.edit', compact('suratkeluar'));
    }

    public function update(SuratKeluarRequest $request, SuratKeluar $suratKeluar)
    {
        $data = $request->validated();
        if ($request->hasFile('file_surat')) {
            if ($suratKeluar->file_surat) {
                Storage::disk('public')->delete($suratKeluar->file_surat);
            }
            $data['file_surat'] = $request->file('file_surat')->store('surat_keluar', 'public');
        }
        $suratKeluar->update($data);

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        if ($suratKeluar->file_surat) {
            Storage::disk('public')->delete($suratKeluar->file_surat);
        }
        $suratKeluar->delete();

        return redirect()->route('surat-keluar.index')->with('success', 'Surat keluar berhasil dihapus.');
    }

    public function download(SuratKeluar $suratKeluar)
    {
        if (! $suratKeluar->file_surat || ! Storage::disk('public')->exists($suratKeluar->file_surat)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download($suratKeluar->file_surat);
    }
}
