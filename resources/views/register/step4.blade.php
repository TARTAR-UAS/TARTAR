<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/register/step4.css') }}'>
        <title>Register Step4</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h1 class='title'>Registrasi Akun</h1>
        <h2 class='sub-title'>Step 4: Isi Prodi </h2>
        </div>

        <div class='form-area'>
        <form action="{{route('register.step4.store')}}" method="POST">
            @csrf
            <label>Fakultas: </label><br>
            <input type='text' name='fakultas' value="{{ old('fakultas', session('register.fakultas'))}}" placeholder='ex: Teknik'><br>
            <label>Program Studi: </label><br>
            <input type='text' name='program_studi' value="{{ old('program_studi', session('register.program_studi'))}}" placeholder='ex: Teknik Sipil'><br>
            <div class='button-wrapper'>
            <a href='{{route('register.step3')}}'><button class='back-button' type="button"> Back </button></a>
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
                <a href='{{ route('register.step4')}}'><button>Kembali</button></a>
              </div>
            </div>
            @endif
        </div>
    </div>
    </body>
</html> 