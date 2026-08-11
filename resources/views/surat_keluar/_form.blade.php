<div class="mb-3">
    <label class="form-label">Nomor Surat</label>
    <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror"
        value="{{ old('nomor_surat', $suratKeluar->nomor_surat ?? '') }}" required>
    @error('nomor_surat')
    <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
{{-- <div class="row"> --}}
    <div class="mb-3">
        <label class="form-label">Tanggal Surat</label>
        <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror"
            value="{{ old('tanggal_surat', isset($suratKeluar) ? $suratKeluar->tanggal_surat->format('Y-m-d') : '') }}"
            required>
        @error('tanggal_surat')
        <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat Penerima</label>
        <input type="text" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror"
            value="{{ old('tujuan', $suratKeluar->tujuan ?? '') }}" required>
        @error('tujuan')
        <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Perihal</label>
        <input type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror"
            value="{{ old('perihal', $suratKeluar->perihal ?? '') }}" required>
        @error('perihal')
        <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- <div class="mb-3">
        <label class="form-label">File Surat (PDF, maks 5 MB)</label>
        <input type="file" name="file_surat" class="form-control @error('file_surat') is-invalid @enderror">
        @if(isset($suratKeluar) && $suratKeluar->file_surat)
            <small class="text-muted">File saat ini: <a
                    href="{{ route('surat-keluar.download', $suratKeluar->id) }}">{{ basename($suratKeluar->file_surat) }}</a></small>
        @endif
        @error('file_surat')
        <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div> --}}
    <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control"
            rows="2">{{ old('keterangan', $suratKeluar->keterangan ?? '') }}</textarea>
    </div>