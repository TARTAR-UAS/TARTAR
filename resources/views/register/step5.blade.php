<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/register/step5.css') }}'>
        <title>Register Step5</title>
    </head>
    <body>
    <div class='parent-container'>
        <div class='top-text'>
        <h1 class='title'>Registrasi Akun</h1>
        <h2 class='sub-title'>Step 5: Masukkan Email dan Password </h2>
        </div>
        
        <div class='form-area'>
        <form action="{{route('register.step5.store')}}" method="POST">
            @csrf
            <label>Email: </label><br>
            <input type='email' name='email' value="{{ old('email', session('register.email'))}}" placeholder='ex: gregorius2@gmail.com'><br>
            <label>Password: </label><br>
            <input type='password' name='password' value="{{ old('password', session('register.password'))}}"><br>
            <div class='button-wrapper'>
            <a href='{{route('register.step4')}}'><button class='back-button' type="button"> Back </button></a>
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
                <a href='{{ route('register.step5')}}'><button>Kembali</button></a>
              </div>
            </div>
            @endif
        </div>
    </div>
    </body>
</html> 