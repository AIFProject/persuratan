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
                <option value="{{ $status }}" {{ old('status', $disposisi->status ?? 'Belum Diproses') == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Tujuan Disposisi</label>
    <input type="text" name="tujuan_disposisi" class="form-control @error('tujuan_disposisi') is-invalid @enderror"
        value="{{ old('tujuan_disposisi', $disposisi->tujuan_disposisi ?? '') }}" required>
    @error('tujuan_disposisi') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Isi Disposisi</label>
    <textarea name="isi_disposisi" class="form-control @error('isi_disposisi') is-invalid @enderror" rows="3"
        required>{{ old('isi_disposisi', $disposisi->isi_disposisi ?? '') }}</textarea>
    @error('isi_disposisi') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>