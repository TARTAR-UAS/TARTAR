<h2>Ajukan Perubahan Data Orang Tua</h2>

<form action="{{ route('form-pengubahan-orangtua') }}" method="POST">
    @csrf

    <div>
        <label for="nama_ayah">Nama Ayah</label> <br>
        <input type="text" name="nama_ayah" id="nama_ayah" required> <br>
        <label for="pekerjaan_ayah">Pekerjaan Ayah</label> <br>
        <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" required> <br>
        <label for="no_telp_ayah">No. Telp Ayah</label> <br>
        <input type="text" name="no_telp_ayah" id="no_telp_ayah" required> <br>
        <label for="nama_ibu">Nama Ibu</label> <br>
        <input type="text" name="nama_ibu" id="nama_ibu" required> <br>
        <label for="pekerjaan_ibu">Pekerjaan Ibu</label> <br>
        <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" required> <br>
        <label for="no_telp_ibu">No. Telp Ibu</label> <br>
        <input type="text" name="no_telp_ibu" id="no_telp_ibu" required> <br>
        <button type="submit">Ajukan Perubahan</button>
    </div>
</form>
