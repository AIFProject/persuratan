<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisposisiRequest;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

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
        $data = $request->validated();

        $data['tujuan_disposisi'] = implode(',', $request->tujuan_disposisi ?? []);
        $data['isi_disposisi'] = implode(',', $request->isi_disposisi ?? []);
        Disposisi::create($data);
        return redirect()
            ->route('disposisi.index')
            ->with('success', 'Disposisi berhasil ditambahkan.');
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
        $data = $request->validated();
        $data['tujuan_disposisi'] = implode(',', $request->tujuan_disposisi ?? []);
        $data['isi_disposisi'] = implode(',', $request->isi_disposisi ?? []);

        $disposisi->update($data);
        return redirect()
            ->route('disposisi.index')
            ->with('success', 'Disposisi berhasil diperbarui.');
    }

    public function destroy(Disposisi $disposisi)
    {
        $disposisi->delete();

        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil dihapus.');
    }

    public function cetakDocx(Disposisi $disposisi)
    {
        $disposisi->load('suratMasuk');

        $template = new TemplateProcessor(
            storage_path('app/templates/disposisi_template.docx')
        );

        $surat = $disposisi->suratMasuk;

        // =====================
        //      DATA SURAT
        // =====================

        $template->setValue('surat_dari', $surat->pengirim);
        $template->setValue('nomor_surat', $surat->nomor_surat);
        $template->setValue('tanggal_surat',$surat->tanggal_surat->format('d/m/Y'));
        $template->setValue('tanggal_diterima', $surat->tanggal_diterima->format('d/m/Y'));
        $template->setValue('perihal', $surat->perihal);
        $template->setValue('sifat', $disposisi->sifat_surat);
        $template->setValue('sangat_segera', $surat->sifat_surat == 'Sangat Segera' ? '☑': '☐');
        $template->setValue('segera', $surat->sifat_surat == 'Segera' ? '☑': '☐');
        $template->setValue('rahasia', $surat->sifat_surat == 'Rahasia' ? '☑': '☐');
        $template->setValue('nomor_agenda', '-');
        $template->setValue('catatan', $dsiposisi->catatan ?? '-');

        // ========TUJUAN DISPOSISI============
        $tujuan = explode(',', $disposisi->tujuan_disposisi);
        $template->setValue('kepala_madrasah', in_array('Kepala Madrasah', $tujuan) ? '☑' : '☐');
        $template->setValue('kepala_tu', in_array('Kepala Tata Usaha', $tujuan) ? '☑' : '☐');
        $template->setValue('waka_kurikulum', in_array('Wakil Kepala Bidang Kurikulum', $tujuan) ? '☑' : '☐');
        $template->setValue('waka_kesiswaan', in_array('Wakil Kepala Bidang Kesiswaan', $tujuan) ? '☑' : '☐');
        $template->setValue('waka_humas', in_array('Wakil Kepala Bidang Hubungan Masyarakat', $tujuan) ? '☑' : '☐');
        $template->setValue('waka_sarpras', in_array('Wakil Kepala Bidang Sarana Prasarana', $tujuan) ? '☑' : '☐');
        $template->setValue('wali_kelas', in_array('Wali Kelas', $tujuan) ? '☑' : '☐');
        $template->setValue('panitia', '-');
        // =========ISI========================
        $isi = explode(',', $disposisi->isi_disposis);
        $template->setValue('tanggapan', in_array('Tanggapan dan Saran', $isi) ? '☑' : '☐');
        $template->setValue('proses', in_array('Proses Lebih Lanjut', $isi) ? '☑' : '☐');
        $template->setValue('koordinasi', in_array('Koordinasi / Konfirmasikan', $isi) ? '☑' : '☐');
        $template->setValue('lain1', '☐');
        $template->setValue('lain2', '☐');
        // ========SIMPAN & dOWNLOAD============
        $folder = storage_path('app/temp');
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        $filename = 'Disposisi-' . $disposisi->id . '.docx';
        $path = $folder . '/' . $filename;
        $template->saveAs($path);
        return response()->download($path)->deleteFileAfterSend(true);
    }
}
