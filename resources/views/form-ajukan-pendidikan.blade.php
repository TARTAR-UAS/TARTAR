<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/edit-histori-pendidikan.css') }}'>
        <title>Edit Riwayat Pendidikan Mahasiswa</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h2>Form Perubahan Data Riwayat Pendidikan</h2>
        </div>

        <div class="form-area">
        <form action="{{ route('form-pengubahan-pendidikan') }}" method="POST">
            @csrf
            <label>Nama Sekolah: </label><br>
            <input type='text' name='nama_sekolah' placeholder='ex: SMA Budi Luhur'><br>
            <label>Jenis Sekolah: </label><br>
            <select name='jenis_sekolah'>
                <option value='SMA'> SMA </option>
                <option value='SMK'> SMK </option>
                <option value='MA'> MA </option>
            </select><br>
            <label>Jurusan: </label><br>
            <input type='text' name='jurusan' placeholder='ex: Teknik'><br>
            <label>Tanggal Masuk: </label><br>
            <input type='date' name='tanggal_masuk' ><br>
            <label>Tanggal Lulus: </label><br>
            <input type='date' name='tanggal_lulus'><br>
            <label>Kota/Kabupaten Sekolah: </label><br>
            <input type='text' name='lokasi_sekolah' placeholder='ex: Jakarta'><br>
            <label>Nilai Akhir Rata-rata: </label><br>
            <input type='text' name='nilai_akhir' placeholder='ex: 90'><br>
            <div class="button-wrapper">
                <a href='{{route('pilih-kategori')}}'><button type="button"> Kembali </button></a>
                <button type="submit">Ajukan Perubahan</button><br>
            </div>
        </form>
        @if ($errors->any())
            <div class='alert-container'>
              <div class="alert-box">
                <h2><strong>Error!</strong></h2>
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
                <a href='{{ route('form-ajukan', 'pendidikan')}}'><button>Kembali</button></a>
              </div>
            </div>
        @endif
    </div>
   </div>
  </body>
</html>
