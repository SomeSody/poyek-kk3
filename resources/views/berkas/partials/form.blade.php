<div class="form-group mb-3">
    <label for="permohonan_id">Permohonan Id</label>
    <input type="text" name="permohonan_id" id="permohonan_id"
           class="form-control @error('permohonan_id') is-invalid @enderror"
           value="{{ old('permohonan_id', $berkas->permohonan_id ?? '') }}">
    @error('permohonan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="nama_berkas">Nama Berkas</label>
    <input type="text" name="nama_berkas" id="nama_berkas"
           class="form-control @error('nama_berkas') is-invalid @enderror"
           value="{{ old('nama_berkas', $berkas->nama_berkas ?? '') }}">
    @error('nama_berkas') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="valid">Valid</label>
    <input type="text" name="valid" id="valid"
           class="form-control @error('valid') is-invalid @enderror"
           value="{{ old('valid', $berkas->valid ?? '') }}">
    @error('valid') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

