<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratKeluarRequest;
use App\Models\SuratKeluar;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    protected GoogleDriveService $googleDriveService;

    public function __construct(GoogleDriveService $googleDriveService)
    {
        $this->googleDriveService = $googleDriveService;
    }

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

            $driveFile = $this->googleDriveService->upload(
                $request->file('file_surat'),
                config('services.google_drive.surat_keluar_folder')
            );

            $data['file_surat'] = $driveFile->getName();
            $data['google_drive_id'] = $driveFile->getId();
            $data['google_drive_url'] = $driveFile->getWebViewLink();
        }

        SuratKeluar::create($data);

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil disimpan.');
    }

    public function show(SuratKeluar $suratKeluar)
    {
        return view('surat_keluar.show', compact('suratKeluar'));
    }

    public function edit(SuratKeluar $suratKeluar)
    {
        return view('surat_keluar.edit', compact('suratKeluar'));
    }

    public function update(SuratKeluarRequest $request, SuratKeluar $suratKeluar)
    {
        $data = $request->validated();

        if ($request->hasFile('file_surat')) {

            if ($suratKeluar->google_drive_id) {
                $this->googleDriveService->delete(
                    $suratKeluar->google_drive_id
                );
            }

            $driveFile = $this->googleDriveService->upload(
                $request->file('file_surat'),
                config('services.google_drive.surat_keluar_folder')
            );

            $data['file_surat'] = $driveFile->getName();
            $data['google_drive_id'] = $driveFile->getId();
            $data['google_drive_url'] = $driveFile->getWebViewLink();
        }

        $suratKeluar->update($data);

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    public function destroy(SuratKeluar $suratKeluar)
    {
        try {

            if ($suratKeluar->google_drive_id) {
                $this->googleDriveService->delete(
                    $suratKeluar->google_drive_id
                );
            }

            $suratKeluar->delete();

            return redirect()
                ->route('surat-keluar.index')
                ->with('success', 'Surat keluar berhasil dihapus.');

        } catch (\Exception $e) {

            return redirect()
                ->route('surat-keluar.index')
                ->with('error', 'Gagal menghapus surat: '.$e->getMessage());
        }
    }

    public function download(SuratKeluar $suratKeluar)
    {
        if (! $suratKeluar->google_drive_url) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return redirect($suratKeluar->google_drive_url);
    }
}
