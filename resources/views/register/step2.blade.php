<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/register/step2.css') }}'>
        <title>Register Step2</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h1 class='title'>Registrasi Akun</h1>
        <h2 class='sub-title'>Step 2: Isi Informasi Asal Sekolah </h2>
        </div>

        <div class='form-area'>
         <form action="{{route('register.step2.store')}}" method="POST">
            @csrf
            <label>Nama Sekolah: </label><br>
            <input type='text' name='nama_sekolah' value="{{ old('nama_sekolah', session('register.nama_sekolah')) }}" placeholder='ex: SMA Budi Luhur'><br>
            <label>Jenis Sekolah: </label><br>
            <select name='jenis_sekolah' value="{{ old('jenis_sekolah', session('register.jenis_sekolah')) }}">
                <option value="" disabled selected hidden>-- Pilih Jenis Sekolah --</option>
                <option value='SMA'> SMA </option>
                <option value='SMK'> SMK </option>
                <option value='MA'> MA </option>
            </select><br>
            <label>Jurusan: </label><br>
            <input type='text' name='jurusan' value="{{ old('jurusan', session('register.jurusan')) }}" placeholder='ex: Teknik'><br>
            <label>Tanggal Masuk: </label><br>
            <input type='date' name='tanggal_masuk' value="{{ old('tanggal_masuk', session('register.tanggal_masuk'))}}" ><br>
            <label>Tanggal Lulus: </label><br>
            <input type='date' name='tanggal_lulus' value="{{ old('tanggal_lulus', session('register.tanggal_lulus'))}}"><br>
            <label>Kota/Kabupaten Sekolah: </label><br>
            <input type='text' name='lokasi_sekolah' value="{{ old('lokasi_sekolah', session('register.lokasi_sekolah'))}}" placeholder='ex: Jakarta'><br>
            <label>Nilai Akhir Rata-rata: </label><br>
            <input type='text' name='nilai_akhir' value="{{ old('nilai_akhir', session('register.nilai_akhir'))}}" placeholder='ex: 90'><br>
            <div class='button-wrapper'>
            <a href='{{route('register.step1')}}'><button class='back-button' type="button"> Back </button></a>
            <button class='next-button'> Next </button>
         </div>
         </form>
            @if($errors->any())
              <div class="alert-container">
                <div class="alert-box">
                    <h2><strong>Error!</strong></h2>
                    <ul>
                        @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                        @endforeach
                    </ul>
                    <a href='{{route('register.step2')}}'><button>Kembali</button></a>
                </div>
               </div>
            @endif
        </div>
    </div>    
    </body>
</html> 