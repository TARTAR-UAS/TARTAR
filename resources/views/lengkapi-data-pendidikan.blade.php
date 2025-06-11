<form action="{{ route('update-data-pendidikan') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
        <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control"
               value="{{ $pendidikan->nama_sekolah ?? old('nama_sekolah') }}">
    </div>

    <div class="mb-3">
        <label for="jenis_sekolah" class="form-label">Jenis Sekolah</label>
        <select name="jenis_sekolah" id="jenis_sekolah" class="form-control">
            <option value="">-- Pilih Jenis Sekolah --</option>
            <option value="SMA" {{ ($pendidikan->jenis_sekolah ?? old('jenis_sekolah')) == 'SMA' ? 'selected' : '' }}>SMA</option>
            <option value="SMK" {{ ($pendidikan->jenis_sekolah ?? old('jenis_sekolah')) == 'SMK' ? 'selected' : '' }}>SMK</option>
            <option value="MA"  {{ ($pendidikan->jenis_sekolah ?? old('jenis_sekolah')) == 'MA'  ? 'selected' : '' }}>MA</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" class="form-control"
               value="{{ $pendidikan->jurusan ?? old('jurusan') }}">
    </div>

    <div class="mb-3">
        <label for="lokasi_sekolah" class="form-label">Lokasi Sekolah</label>
        <input type="text" name="lokasi_sekolah" id="lokasi_sekolah" class="form-control"
               value="{{ $pendidikan->lokasi_sekolah ?? old('lokasi_sekolah') }}">
    </div>

    <div class="mb-3">
        <label for="nilai_akhir" class="form-label">Nilai Akhir</label>
        <input type="number" name="nilai_akhir" id="nilai_akhir" class="form-control" step="0.01"
               value="{{ $pendidikan->nilai_akhir ?? old('nilai_akhir') }}">
    </div>

    <div class="mb-3">
        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
               value="{{ $pendidikan->tanggal_masuk ?? old('tanggal_masuk') }}">
    </div>

    <div class="mb-3">
        <label for="tanggal_lulus" class="form-label">Tanggal Lulus</label>
        <input type="date" name="tanggal_lulus" id="tanggal_lulus" class="form-control"
               value="{{ $pendidikan->tanggal_lulus ?? old('tanggal_lulus') }}">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
