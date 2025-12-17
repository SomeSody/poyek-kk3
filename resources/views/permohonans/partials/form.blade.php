<div class="form-group mb-3">
    <label for="nomor_permohonan">Nomor Permohonan</label>
    <input type="number" name="nomor_permohonan" id="nomor_permohonan"
           class="form-control @error('nomor_permohonan') is-invalid @enderror"
           value="{{ old('nomor_permohonan', $permohonan->nomor_permohonan ?? '') }}">
    @error('nomor_permohonan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="pemohon_warga_id">Pemohon Warga Id</label>
    <input type="text" name="pemohon_warga_id" id="pemohon_warga_id"
           class="form-control @error('pemohon_warga_id') is-invalid @enderror"
           value="{{ old('pemohon_warga_id', $permohonan->pemohon_warga_id ?? '') }}">
    @error('pemohon_warga_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="jenis_id">Jenis Id</label>
    <input type="text" name="jenis_id" id="jenis_id"
           class="form-control @error('jenis_id') is-invalid @enderror"
           value="{{ old('jenis_id', $permohonan->jenis_id ?? '') }}">
    @error('jenis_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
    <input type="text" name="tanggal_pengajuan" id="tanggal_pengajuan"
           class="form-control @error('tanggal_pengajuan') is-invalid @enderror"
           value="{{ old('tanggal_pengajuan', $permohonan->tanggal_pengajuan ?? '') }}">
    @error('tanggal_pengajuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="status">Status</label>
    <input type="text" name="status" id="status"
           class="form-control @error('status') is-invalid @enderror"
           value="{{ old('status', $permohonan->status ?? '') }}">
    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group mb-3">
    <label for="catatan">Catatan</label>
    <textarea name="catatan" id="catatan" rows="4"
              class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan', $permohonan->catatan ?? '') }}</textarea>
    @error('catatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

