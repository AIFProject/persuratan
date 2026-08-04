<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratMasukRequest;
use App\Models\SuratMasuk;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    protected GoogleDriveService $googleDriveService;

    public function __construct(GoogleDriveService $googleDriveService)
    {
        $this->googleDriveService = $googleDriveService;
    }

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

            $driveFile = $this->googleDriveService->upload(
                $request->file('file_surat')
            );

            $data['file_surat'] = $driveFile->getName();

            $data['google_drive_id'] = $driveFile->getId();

            $data['google_drive_url'] = $driveFile->getWebViewLink();
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

            if ($suratMasuk->google_drive_id) {

                $this->googleDriveService->delete(
                    $suratMasuk->google_drive_id
                );

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
        if (! $suratMasuk->google_drive_url) {
            return back()->with('error', 'File belum tersedia.');
        }

        return redirect($suratMasuk->google_drive_url);
    }
}
