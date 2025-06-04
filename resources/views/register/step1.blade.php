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
        <h2 class='sub-title'>Step 1: Isi Biodata </h2>
        </div>

        <div class='form-area'>
        <form action="{{route('register.step1.store')}}" method="POST">
            @csrf
            <label>Nama: </label><br>
            <input class= 'nama-input' type='text' name='nama' placeholder='ex: Gregorius'><br>
            <label>Jenis Kelamin: </label><br>
            <select class= 'gender-input' name='jenis_kelamin'>
                <option value='Laki-laki'>Laki-laki</option>
                <option value='Laki-laki'>Perempuan</option>
            </select><br>
            <label>Tanggal Lahir: </label><br>
            <input class= 'date-input' type='date' name='tanggal_lahir'><br>
            <label>Tempat Lahir: </label><br>
            <input class='tempat-lahir-input' type='text' name='tempat_lahir' placeholder='ex: Jakarta'><br>
            <label>Alamat: </label><br>
            <input class='alamat-input' type='text' name='alamat' placeholder='ex: Kampung Durian Runtuh'><br>
            <label>Nomor Telepon: </label><br>
            <input class='telp-input' type='text' name='no_telp' placeholder='ex: 081290992713'><br>
            <div class='button-wrapper'>
            <button class='next-button'> Next </button>
            </div>
        </form>
        </div>
    </div>
    </body>
</html> 