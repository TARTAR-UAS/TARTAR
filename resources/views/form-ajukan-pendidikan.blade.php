@section('content')
<h2>Ajukan Perubahan Riwayat Pendidikan</h2>

<form action="{{ route('form-pengubahan-pendidikan') }}" method="POST">
    @csrf

    <div>
        <label for="nama_sekolah">Nama Sekolah</label> <br>
        <input type="text" name="nama_sekolah" id="nama_sekolah" required> <br>
        <label for="jenis_sekolah">Jenis Sekolah</label> <br>
        <input type="text" name="jenis_sekolah" id="jenis_sekolah" required> <br>
        <label for="jurusan">Jurusan</label><br>
        <input type="text" name="jurusan" id="jurusan" required><br>
        <label for="tanggal_masuk">Tanggal Masuk</label><br>
        <input type="date" name="tanggal_masuk" id="tanggal_masuk" required><br>
        <label for="tanggal_lulus">Tanggal Lulus</label><br>
        <input type="date" name="tanggal_lulus" id="tanggal_lulus" required><br>
        <label for="lokasi_sekolah">Lokasi Sekolah</label><br>
        <input type="text" name="lokasi_sekolah" id="lokasi_sekolah" required><br>
        <label for="nilai_akhir">Nilai Akhir</label><br>
        <input type="text" name="nilai_akhir" id="nilai_akhir" required><br>
        <button type="submit">Ajukan Perubahan</button>
    </div>
</form>
