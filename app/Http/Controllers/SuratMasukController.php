<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratMasukRequest;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratMasuk::latest();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nomor_surat', 'like', "%{$search}%")
                    ->orWhere('pengirim', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }

        $suratMasuk = $query->paginate(10)->withQueryString();

        return view('surat_masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat_masuk.create');
    }

    public function store(SuratMasukRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('file_surat')) {

            $data['file_surat'] = $request
                ->file('file_surat')
                ->store('surat_masuk', 'public');

        }

        SuratMasuk::create($data);

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil disimpan.');
    }

    public function show(SuratMasuk $suratMasuk)
    {
        return view('surat_masuk.show', compact('suratMasuk'));
    }

    public function edit(SuratMasuk $suratMasuk)
    {
        return view('surat_masuk.edit', compact('suratMasuk'));
    }

    public function update(SuratMasukRequest $request, SuratMasuk $suratMasuk)
    {
        $data = $request->validated();

        if ($request->hasFile('file_surat')) {

            if ($suratMasuk->file_surat) {
                Storage::disk('public')
                    ->delete($suratMasuk->file_surat);
            }

            $data['file_surat'] = $request
                ->file('file_surat')
                ->store('surat_masuk', 'public');
        }

        $suratMasuk->update($data);

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    public function destroy(SuratMasuk $suratMasuk)
    {
        try {

            if ($suratMasuk->file_surat) {
                Storage::disk('public')
                    ->delete($suratMasuk->file_surat);
            }

            $suratMasuk->delete();

            return redirect()
                ->route('surat-masuk.index')
                ->with('success', 'Surat masuk berhasil dihapus');

        } catch (\Exception $e) {

            return redirect()
                ->route('surat-masuk.index')
                ->with('error', 'Gagal menghapus surat. '.$e->getMessage());

        }
    }

    public function download(SuratMasuk $suratMasuk)
    {
        if (! $suratMasuk->file_surat) {
            return back()
                ->with('error', 'File tidak ditemukan.');
        }

        return Storage::disk('public')
            ->download($suratMasuk->file_surat);
    }
}
