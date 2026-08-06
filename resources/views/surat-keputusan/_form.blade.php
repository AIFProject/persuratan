<div class="row">
    {{-- -Nomor SK --}}
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">
            Nomor SK <span class="text-danger">*</span>
        </label>
        <input type="text" name="nomor_sk" class="form-control @error('form_sk') is-invalid @enderror"
            value="{{ old('nomor_sk', $suratKeputusan->nomor_sk ?? '') }}" placeholder="Masukkan Nomor SK">

        @error('nomor_sk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    {{-- -Nama SK --}}
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">
            Nama SK <span class="text-danger">*</span>
        </label>
        <input type="text" name="nama_sk" class="form-control @error('nama_sk') is-invalid @enderror"
            value="{{ old('nama_sk', $suratKeputusan->nama_sk ?? '') }}" placeholder="Masukkan nama SK">
        @error('nama_sk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- -Tanggal --}}
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">
            Tanggal <span class="text-danger">*</span>
        </label>
        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
            value="{{ old('tanggal', isset($suratKeputusan) ? $suratKeputusan->tanggal?->format('Y-m-d') : '') }}">

        @error('tanggal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Perihal --}}
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">
            Perihal <span class="text-danger">*</span>
        </label>
        <input type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror"
            value="{{ old('perihal', $suratKeputusan->perihal ?? '') }}" placeholder="Masukkan Perihal">
        @error('perihal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Upload File --}}
    <div class="col-12 mb-3">
        <label class="form-label fw-semibold">
            Upload File SK (PDF)
        </label>
        <input type="file" name="file_sk" class="form-control @error('file_sk')
            is-invalid
        @enderror" accept=".pdf">
        @error('file_sk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @isset($suratKeputusan)
            @if ($suratKeputusan->google_drive_url)
                <div class="mt-2">
                    <a href="{{ $suratKeputusan->google_drive_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                        <span class="material-symbols-outlined">visibility</span>
                        Lihat File Saat ini
                    </a>
                </div>
            @endif
        @endisset
    </div>
</div>
<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('surat-keputusan.index') }}" class="btn btn-secondary">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>

    <button type="submit" class="btn btn-success">
        <span class="material-symbols-outlined">save</span>
        Simpan
    </button>
</div>