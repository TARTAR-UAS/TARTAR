<form action="{{ route('update-data-pendidikan') }}" method="POST">
    @csrf

    <div class="pendidikan-group">
        <div class="mb-3">
            <label>Nama Sekolah</label>
            <input type="text" name="pendidikan[nama_sekolah][]" class="form-control" value="{{ $pendidikan->nama_sekolah ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Jenis Sekolah</label>
            <input type="text" name="pendidikan[jenis_sekolah][]" class="form-control" value="{{ $pendidikan->jenis_sekolah ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="pendidikan[jurusan][]" class="form-control" value="{{ $pendidikan->jurusan ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Lokasi Sekolah</label>
            <input type="text" name="pendidikan[lokasi_sekolah][]" class="form-control" value="{{ $pendidikan->lokasi_sekolah ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Nilai Akhir</label>
            <input type="number" name="pendidikan[nilai_akhir][]" class="form-control" value="{{ $pendidikan->nilai_akhir ?? '' }}">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
