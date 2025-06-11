<h2>Ajukan Perubahan Data Mahasiswa</h2>

<form action="{{ route('form-pengubahan-mahasiswa') }}" method="POST">
    @csrf

    <div>
        <label for="nama_depan">Nama Depan</label> <br>
        <input type="text" name="nama_depan" id="nama_depan" required> <br>
        <label for="nama_belakang">Nama Belakang</label> <br>
        <input type="text" name="nama_belakang" id="nama_belakang" required> <br>
        <label for="jenis_kelamin">Jenis Kelamin</label> <br>
        <select name="jenis_kelamin" id="jenis_kelamin" required> 
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select> <br>
        <label for="agama">Agama</label><br>
        <input type="text" name="agama" id="agama" required><br>
        <label for="tempat_lahir">Tempat Lahir</label><br>
        <input type="text" name="tempat_lahir" id="tempat_lahir" required><br>
        <label for="tanggal_lahir">Tanggal Lahir</label><br>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required><br>
        <label for="alamat">Alamat</label><br>
        <input type="text" name="alamat" id="alamat" required><br>
        <label for="program_studi">Program Studi</label><br>
        <input type="text" name="program_studi" id="program_studi" required><br>
        <label for="fakultas">Fakultas</label><br>
        <input type="text" name="fakultas" id="fakultas" required><br>
        <button type="submit">Ajukan Perubahan</button><br>
     </div>
</form>
