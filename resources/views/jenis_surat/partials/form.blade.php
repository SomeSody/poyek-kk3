<div class="form-group mb-3">
    <label for="kode">Kode</label>
    <input type="text" name="kode" id="kode"
           class="form-control @error('kode') is-invalid @enderror"
           value="{{ old('kode', $jenis_surat->kode ?? '') }}">
    @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="jenis_surat">Jenis Surat</label>
    <input type="text" name="jenis_surat" id="jenis_surat"
           class="form-control @error('jenis_surat') is-invalid @enderror"
           value="{{ old('jenis_surat', $jenis_surat->jenis_surat ?? '') }}">
    @error('jenis_surat') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="syarat_json">Syarat JSON</label>
    <input type="text" name="syarat_json" id="syarat_json"
           class="form-control @error('syarat_json') is-invalid @enderror"
           value="{{ old('syarat_json', $jenis_surat->syarat_json ?? '') }}">
    @error('syarat_json') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

