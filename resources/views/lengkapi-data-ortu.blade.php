        <h4 class="mt-5">Data Orang Tua</h4>
        <form action="{{ route('update-data-orangtua') }}" method="POST">
            @csrf
        <div class="mb-3">
            <label>Nama Ayah</label>
            <input type="text" name="nama_ayah" class="form-control" value="{{ $orangtua->nama_ayah ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Pekerjaan Ayah</label>
            <input type="text" name="pekerjaan_ayah" class="form-control" value="{{ $orangtua->pekerjaan_ayah ?? '' }}">
        </div>
        <div class="mb-3">
            <label>No Telp Ayah</label>
            <input type="text" name="no_telp_ayah" class="form-control" value="{{ $orangtua->no_telp_ayah ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" class="form-control" value="{{ $orangtua->nama_ibu ?? '' }}">
        </div>
        <div class="mb-3">
            <label>Pekerjaan Ibu</label>
            <input type="text" name="pekerjaan_ibu" class="form-control" value="{{ $orangtua->pekerjaan_ibu ?? '' }}">
        </div>
        <div class="mb-3">
            <label>No Telp Ibu</label>
            <input type="text" name="no_telp_ibu" class="form-control" value="{{ $orangtua->no_telp_ibu ?? '' }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
