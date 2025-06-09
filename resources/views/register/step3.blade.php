<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/register/step3.css') }}'>
        <title>Register Step3</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h1 class='title'>Registrasi Akun</h1>
        <h2 class='sub-title'>Step 3: Isi Data Orang Tua </h2>
        </div>

        <div class='form-area'>
        <form action="{{route('register.step3.store')}}" method="POST">
            @csrf
            <label>Nama Ayah: </label><br>
            <input type='text' name='nama_ayah' value="{{ old('nama_ayah', session('register.nama_ayah'))}}" placeholder='ex: Andi Wijaya'><br>
            <label>Pekerjaan Ayah: </label><br>
            <input type='text' name='pekerjaan_ayah' value="{{ old('pekerjaan_ayah', session('register.pekerjaan_ayah'))}}" placeholder='ex: Pengusaha'><br>
            <label>Nomor Ayah: </label><br>
            <input type='text' name='no_telp_ayah' value="{{ old('no_telp_ayah', session('register.no_telp_ayah'))}}" placeholder='ex: 081290992713'><br>
            <label>Nama Ibu: </label><br>
            <input type='text' name='nama_ibu' value="{{ old('nama_ibu', session('register.nama_ibu'))}}" placeholder='ex: Rosa Ainul'><br>
            <label>Pekerjaan Ibu: </label><br>
            <input type='text' name='pekerjaan_ibu' value="{{ old('pekerjaan_ibu', session('register.pekerjaan_ibu'))}}" placeholder='ex: Pengusaha'><br>
            <label>Nomor Ibu: </label><br>
            <input type='text' name='no_telp_ibu' value="{{ old('no_telp_ibu', session('register.no_telp_ibu'))}}" placeholder='ex: 081290992713'><br>
            <div class='button-wrapper'>
            <a href='{{route('register.step2')}}'><button class='back-button' type="button"> Back </button></a>
            <button class='next-button'> Next </button>
            </div>
        </form>
         <!--Menampilkan pesan error dengan styling di css -->
           @if ($errors->any())
            <div class='alert-container'>
              <div class="alert-box">
                <h2><strong>Error!</strong></h2>
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
                <a href='{{ route('register.step3')}}'><button>Kembali</button></a>
              </div>
            </div>
            @endif
        </div>
    </div>
    </body>
</html> 