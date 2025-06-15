<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/register/confirmation.css') }}'>
        <title>Register Confirmation</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h1 class='title'>Registrasi Akun</h1>
        <h2 class='sub-title'>Confirmation: Konfirmasi Data</h2>
        </div>
        
        <div class='data-area'>
            <div class='first-info-row'>
            <label>Nama Depan: </label>
            <input type='text' value="{{ old('nama_depan', session('register.nama_depan')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Nama Belakang: </label>
            <input type='text' value="{{ old('nama_belakang', session('register.nama_belakang')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Jenis Kelamin: </label>
            <input type='text' value="{{ old('jenis_kelamin', session('register.jenis_kelamin')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Agama: </label>
            <input type ='text' value="{{ old('agama', session('register.agama')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Tanggal Lahir: </label>
            <input type='date' value="{{ old('tanggal_lahir', session('register.tanggal_lahir')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Tempat Lahir: </label>
            <input type='text' value="{{ old('tempat_lahir', session('register.tempat_lahir')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Alamat: </label>
            <input type='text' value="{{ old('alamat', session('register.alamat')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Nomor Telepon: </label>
            <input type='text' value="{{ old('no_telp', session('register.no_telp')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Nama Sekolah: </label>
            <input type='text' value="{{ old('nama_sekolah', session('register.nama_sekolah')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Jenis Sekolah: </label>
            <input type='text'  value="{{ old('jenis_sekolah', session('register.jenis_sekolah')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Jurusan: </label>
            <input type='text' value="{{ old('jurusan', session('register.jurusan')) }}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Tanggal Masuk: </label>
            <input type='date' value="{{ old('tanggal_masuk', session('register.tanggal_masuk'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Tanggal Lulus: </label>
            <input type='date' value="{{ old('tanggal_lulus', session('register.tanggal_lulus'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Kota/Kabupaten Sekolah: </label>
            <input type='text' value="{{ old('lokasi_sekolah', session('register.lokasi_sekolah'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Nilai Akhir Rata-rata: </label>
            <input type='text' value="{{ old('nilai_akhir', session('register.nilai_akhir'))}}" readonly><br>
            </div>

            <div class='info-row'>
             <label>Nama Ayah: </label>
            <input type='text' value="{{ old('nama_ayah', session('register.nama_ayah'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Pekerjaan Ayah: </label>
            <input type='text' value="{{ old('pekerjaan_ayah', session('register.pekerjaan_ayah'))}}" readonly ><br>
            </div>

            <div class='info-row'>
            <label>Nomor Ayah: </label>
            <input type='text' value="{{ old('no_telp_ayah', session('register.no_telp_ayah'))}}" readonly ><br>
            </div>

            <div class='info-row'>
            <label>Nama Ibu: </label>
            <input type='text' value="{{ old('nama_ibu', session('register.nama_ibu'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Pekerjaan Ibu: </label>
            <input type='text' value="{{ old('pekerjaan_ibu', session('register.pekerjaan_ibu'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Nomor Ibu: </label>
            <input type='text' value="{{ old('no_telp_ibu', session('register.no_telp_ibu'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Fakultas: </label>
            <input type='text' value="{{ old('fakultas', session('register.fakultas'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Program Studi: </label>
            <input type='text' value="{{ old('program_studi', session('register.program_studi'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Email: </label>
            <input type='email'value="{{ old('email', session('register.email'))}}" readonly><br>
            </div>

            <div class='info-row'>
            <label>Password: </label>
            <input type='password' value="{{ old('password', session('register.password'))}}" readonly><br>
            </div>

            <form action="{{route('register.confirm.store')}}" method="POST">
                @csrf
                <div class='button-wrapper'>
                <a href='{{route('register.step5')}}'><button class='back-button' type="button"> Back </button></a>
                <button class='submit-button'> Submit </button>
                </div>
            </form>
        </div>
    </div>
    </body>
</html> 