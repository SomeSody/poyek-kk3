<div class="form-group mb-3">
    <label for="permohonan_id">Permohonan Id</label>
    <input type="text" name="permohonan_id" id="permohonan_id"
           class="form-control @error('permohonan_id') is-invalid @enderror"
           value="{{ old('permohonan_id', $riwayat->permohonan_id ?? '') }}">
    @error('permohonan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="status">Status</label>
    <input type="text" name="status" id="status"
           class="form-control @error('status') is-invalid @enderror"
           value="{{ old('status', $riwayat->status ?? '') }}">
    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="petugas_warga_id">Petugas Warga Id</label>
    <input type="text" name="petugas_warga_id" id="petugas_warga_id"
           class="form-control @error('petugas_warga_id') is-invalid @enderror"
           value="{{ old('petugas_warga_id', $riwayat->petugas_warga_id ?? '') }}">
    @error('petugas_warga_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="waktu">Waktu</label>
    <input type="text" name="waktu" id="waktu"
           class="form-control @error('waktu') is-invalid @enderror"
           value="{{ old('waktu', $riwayat->waktu ?? '') }}">
    @error('waktu') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="keterangan">Keterangan</label>
    <textarea name="keterangan" id="keterangan" rows="4"
              class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $riwayat->keterangan ?? '') }}</textarea>
    @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

