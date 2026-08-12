<div class="mb-3">
    <label class="form-label">Surat Masuk</label>
    <select name="surat_masuk_id" class="form-select @error('surat_masuk_id') is-invalid @enderror" required>
        <option value="">-- Pilih Surat Masuk --</option>
        @foreach($suratMasukList as $sm)
            <option value="{{ $sm->id }}" {{ old('surat_masuk_id', $disposisi->surat_masuk_id ?? '') == $sm->id ? 'selected' : '' }}>
                {{ $sm->nomor_surat }} - {{ $sm->pengirim }} ({{ $sm->perihal }})
            </option>
        @endforeach
    </select>
    @error('surat_masuk_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Disposisi</label>
        <input type="date" name="tanggal_disposisi"
            class="form-control @error('tanggal_disposisi') is-invalid @enderror"
            value="{{ old('tanggal_disposisi', isset($disposisi) ? $disposisi->tanggal_disposisi->format('Y-m-d') : date('Y-m-d')) }}"
            required>
        @error('tanggal_disposisi') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
            @foreach(['Belum diproses', 'Diproses', 'Selesai'] as $status)
                <option value="{{ $status }}" {{ old('status', $disposisi->status ?? 'Belum diproses') == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">
        Sifat Surat
    </label>

    <select
        name="sifat_surat"
        class="form-select @error('sifat_surat') is-invalid @enderror">

        @foreach([
            'Segera',
            'Sangat Segera',
            'Rahasia'
        ] as $item)

            <option
                value="{{ $item }}"
                {{ old('sifat_surat', $disposisi->sifat_surat ?? 'Biasa') == $item ? 'selected' : '' }}>

                {{ $item }}

            </option>

        @endforeach

    </select>

    @error('sifat_surat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="mb-3">
    <label class="form-label fw-semibold">
        Diteruskan Kepada
    </label>
    @php
        $selected = old(
            'tujuan_disposisi',
            isset($disposisi)
                ? explode(',', $disposisi->tujuan_disposisi)
                : []
        );
    @endphp
    @foreach([
        'Kepala Madrasah',
        'Kepala Tata Usaha',
        'Wakil Kepala Bidang Kurikulum',
        'Wakil Kepala Bidang Kesiswaan',
        'Wakil Kepala Bidang Humas',
        'Wakil Kepala Bidang Sarana Prasarana',
        'Wali Kelas / Guru BK / Panitia'
    ] as $tujuan)
        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                name="tujuan_disposisi[]"
                value="{{ $tujuan }}"
                {{ in_array($tujuan,$selected) ? 'checked' : '' }}>
            <label class="form-check-label">
                {{ $tujuan }}
            </label>
        </div>
    @endforeach
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">
        Dengan Hormat Harap
    </label>
    @php
        $isi = old(
            'isi_disposisi',
            isset($disposisi)
                ? explode(',', $disposisi->isi_disposisi)
                : []
        );
    @endphp
    @foreach([
        'Tanggapan dan Saran',
        'Proses Lebih Lanjut',
        'Koordinasi / Konfirmasikan'
    ] as $item)
        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                name="isi_disposisi[]"
                value="{{ $item }}"
                {{ in_array($item,$isi) ? 'checked' : '' }}>
            <label class="form-check-label">
                {{ $item }}
            </label>
        </div>
    @endforeach
    
    <div class="form-check mb-2">
        <input
            class="form-check-input" 
            type="checkbox" 
            name="isi_disposisi[]"
            value="lain1"
            id="lain1"
            {{ in_array('lain1', $isi) ? 'checked' : '' }}>
        
        <label for="lain1" class="form-check-label">
            Lain-lain
        </label>
    </div>
    <input
    type="text"
    name="lain1_text"
    class="form-control mt-2"
    placeholder="Isi keterangan lain-lain"
    value="{{ old('lain1_text', $disposisi->lain1_text ?? '') }}">
</div>

<div class="mb-3">

    <label class="form-label fw-semibold">

        Catatan

    </label>

    <textarea
        name="catatan"
        rows="3"
        class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan', $disposisi->catatan ?? '') }}</textarea>

    @error('catatan')
        <div class="invalid-feedback">

            {{ $message }}

        </div>
    @enderror

</div>