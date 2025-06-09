<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/register/step1.css') }}'>
        <title>Register Step1</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h1 class='title'>Registrasi Akun</h1>
        <h2 class='sub-title'>Step 1: Isi Biodata</h2>
        </div>

        <div class='form-area'>
        <form action="{{route('register.step1.store')}}" method="POST">
            @csrf
            <label>Nama Depan: </label><br>
            <!--Penggunaan fungsi old() disini agar ketika memencet back button apa yang kita isi tercetak di input field -->
            <input type='text' name='nama_depan' value="{{ old('nama_depan', session('register.nama_depan')) }}" placeholder='ex: Gregorius'><br>
            <label>Nama Belakang: </label><br>
            <input type='text' name='nama_belakang' value="{{ old('nama_belakang', session('register.nama_belakang')) }}" placeholder='ex: Betradius'><br>
            <label>Jenis Kelamin: </label><br>
            <select class= 'gender-input' name='jenis_kelamin' value="{{ old('jenis_kelamin', session('register.jenis_kelamin')) }}">
                <option value='Laki-laki'>Laki-laki</option>
                <option value='Laki-laki'>Perempuan</option>
            </select><br>
            <label>Agama: </label><br>
            <select class='agama-input' name='agama' value="{{ old('agama', session('register.agama')) }}">
                <option value='Islam'>Islam</option>
                <option value='Kristen'>Kristen</option>
                <option value='Katolik'>Katolik</option>
                <option value='Buddha'>Buddha</option>
                <option value='Hindu'>Hindu</option>
                <option value='Konghucu'>Konghucu</option>
            </select><br>
            <label>Tanggal Lahir: </label><br>
            <input type='date' name='tanggal_lahir' value="{{ old('tanggal_lahir', session('register.tanggal_lahir')) }}"><br>
            <label>Tempat Lahir: </label><br>
            <input type='text' name='tempat_lahir' value="{{ old('tempat_lahir', session('register.tempat_lahir')) }}" placeholder='ex: Jakarta'><br>
            <label>Alamat: </label><br>
            <input type='text' name='alamat' value="{{ old('alamat', session('register.alamat')) }}" placeholder='ex: Kampung Durian Runtuh'><br>
            <label>Nomor Telepon: </label><br>
            <input type='text' name='no_telp' value="{{ old('no_telp', session('register.no_telp')) }}" placeholder='ex: 081290992713'><br>
            <div class='button-wrapper'>
            <a href='{{route('login')}}'><button class='back-button' type="button"> Back </button></a>
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
                <a href='{{ route('register.step1')}}'><button>Kembali</button></a>
              </div>
            </div>
            @endif
        </div>
    </div>
    </body>
</html> 