<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/edit-orangtua.css') }}'>
        <title>Edit Data Orang Tua</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h2>Form Perubahan Data Orang Tua</h2>
        </div>

        <div class="form-area">
        <form action="{{ route('form-pengubahan-orangtua') }}" method="POST">
            @csrf
            <label>Nama Ayah: </label><br>
            <input type='text' name='nama_ayah' placeholder='ex: Andi Wijaya'><br>
            <label>Pekerjaan Ayah: </label><br>
            <input type='text' name='pekerjaan_ayah' placeholder='ex: Pengusaha'><br>
            <label>Nomor Ayah: </label><br>
            <input type='text' name='no_telp_ayah' placeholder='ex: 081290992713'><br>
            <label>Nama Ibu: </label><br>
            <input type='text' name='nama_ibu'  placeholder='ex: Rosa Ainul'><br>
            <label>Pekerjaan Ibu: </label><br>
            <input type='text' name='pekerjaan_ibu'  placeholder='ex: Pengusaha'><br>
            <label>Nomor Ibu: </label><br>
            <input type='text' name='no_telp_ibu' placeholder='ex: 081290992713'><br>
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
                <a href='{{ route('form-ajukan', 'orangtua')}}'><button>Kembali</button></a>
              </div>
            </div>
        @endif
    </div>
   </div>
  </body>
</html>
