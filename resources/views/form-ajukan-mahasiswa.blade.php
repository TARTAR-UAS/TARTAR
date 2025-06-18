<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/edit-mahasiswa.css') }}'>
        <title>Edit Data Mahasiswa</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h2>Form Perubahan Data Mahasiswa</h2>
        </div>

        <div class="form-area">
        <form action="{{ route('form-pengubahan-mahasiswa') }}" method="POST">
            @csrf
            <label>Nama Depan: </label><br>
            <input type='text' name='nama_depan' placeholder='ex: Gregorius'><br>
            <label>Nama Belakang: </label><br>
            <input type='text' name='nama_belakang' placeholder='ex: Betradius'><br>
            <label>Jenis Kelamin: </label><br>
            <select name='jenis_kelamin'>
                <option value='Laki-laki'>Laki-laki</option>
                <option value='Laki-laki'>Perempuan</option>
            </select><br>
            <label>Agama: </label><br>
            <select name='agama'>
                <option value='Islam'>Islam</option>
                <option value='Kristen'>Kristen</option>
                <option value='Katolik'>Katolik</option>
                <option value='Buddha'>Buddha</option>
                <option value='Hindu'>Hindu</option>
                <option value='Konghucu'>Konghucu</option>
            </select><br>
            <label>Tanggal Lahir: </label><br>
            <input type='date' name='tanggal_lahir'><br>
            <label>Tempat Lahir: </label><br>
            <input type='text' name='tempat_lahir' placeholder='ex: Jakarta'><br>
            <label>Alamat: </label><br>
            <input type='text' name='alamat' placeholder='ex: Kampung Durian Runtuh'><br>
             <label>Fakultas: </label><br>
            <input type='text' name='fakultas' placeholder='ex: Teknik'><br>
            <label>Program Studi: </label><br>
            <input type='text' name='program_studi' placeholder='ex: Teknik Sipil'><br>
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
                <a href='{{ route('form-ajukan', 'mahasiswa')}}'><button>Kembali</button></a>
              </div>
            </div>
            @endif
        </div>
    </div>
</body>
</html>

