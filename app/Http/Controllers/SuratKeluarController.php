<?php
namespace App\Http\Controllers;

use App\Http\Request\SuratKeluarRequest;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller {
    public function index(Request $request) {
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

    public function create() {
        return view('surat_keluar.create');
    }

    public function store(SuratKeluarRequest $request) {
        $data = $request->validated();
        SuratKeluar::create($data);
        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat Keluar berhasil disimpan.');
    }

    public function show(SuratKeluar $suratKeluar) {
        return view('surat_keluar.show', compact('suratKeluar'));
    }

    public function edit(SuratKeluar $suratKeluar) {
        return view('surat_keluar.edit', compact('suratKeluar'));
    }

    public function update(SuratKeluarRequest $request, SuratKeluar $suratKeluar) {
        $data = $request->validated();

        $suratKeluar->update($data);
        return redirect()
            ->route('surat-keluar.index')
            ->with('successs', 'Surat Keluar berhasil diperbarui.');
    }

    public function destroy(SuratKeluar $suratkeluar) {
        try {
            $suratkeluar->delete();

            return redirect()
                ->route('surat-keluar.index')
                ->with('success', 'Surat Keluar berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()
                ->route('surat-keluar.index')
                ->with('Error', 'Gagal menghapus surat: ' . $e->getMessage());
        }
    }
}