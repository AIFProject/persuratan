<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratKeputusanRequest;
use App\Models\SuratKeputusan;
use App\Services\GoogleDriveService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SuratKeputusanController extends Controller
{
    protected $driveService;

    public function __construct(GoogleDriveService $driveService)
    {
        $this->driveService = $driveService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SuratKeputusan::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nomor_sk', 'like', "%{$search}%")
                    ->orWhere('nama_sk', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }

        $suratKeputusan = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('surat-keputusan.index', compact('suratKeputusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('surat-keputusan.create');
    }

    public function store(SuratKeputusanRequest $request)
    {
        $data = $request->validated();

        $data['created_by'] = auth()->id();

        if ($request->hasFile('file_sk')) {
            $driveFile = $this->driveService->upload(
                $request->file('file_sk'),
                config('services.google_drive.surat_keputusan_folder')
            );

            $data['file_sk'] = $driveFile->getName();
            $data['google_drive_id'] = $driveFile->getId();
            $data['google_drive_url'] = $driveFile->getWebViewLink();
        }

        SuratKeputusan::create($data);

        return redirect()
            ->route('surat-keputusan.index')
            ->with('success', 'Surat Keputusan berhasil disimpan.');
    }

    public function show(SuratKeputusan $suratKeputusan)
    {
        return view('surat-keputusan.show', compact('suratKeputusan'));
    }

    public function edit(SuratKeputusan $suratKeputusan)
    {
        return view('surat-keputusan.edit', compact('suratKeputusan'));
    }

    public function update(SuratKeputusanRequest $request, SuratKeputusan $suratKeputusan)
    {
        $data = $request->validated();

        if ($request->hasFile('file_sk')) {

            if ($suratKeputusan->google_drive_id) {
                $this->driveService->delete(
                    $suratKeputusan->google_drive_id
                );
            }
            $driveFile = $this->driveService->upload(
                $request->file('file_sk'),
                config('services.google_drive.surat_keputusan_folder')
            );
            $data['file_sk'] = $driveFile->getName();
            $data['google_drive_id'] = $driveFile->getId();
            $data['google_drive_url'] = $driveFile->getWebViewLink();
        }

        $suratKeputusan->update($data);

        return redirect()
            ->route('surat-keputusan.index')
            ->with('success', 'Surat Keputusan berhasil diperbarui.');
    }

    public function destroy(SuratKeputusan $suratKeputusan)
    {
        try {

            if ($suratKeputusan->google_drive_id) {
                $this->driveService->delete(
                    $suratKeputusan->google_drive_id
                );
            }

            $suratKeputusan->delete();

            return redirect()
                ->route('surat-keputusan.index')
                ->with('success', 'Surat keluar berhasil dihapus.');

        } catch (\Exception $e) {

            return redirect()
                ->route('surat-keputusan.index')
                ->with('error', 'Gagal menghapus surat: '.$e->getMessage());
        }
    }

    public function download(SuratKeputusan $suratKeputusan)
    {
        if (! $suratKeputusan->google_drive_url) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return redirect()->away($suratKeputusan->google_drive_url);
    }
}
