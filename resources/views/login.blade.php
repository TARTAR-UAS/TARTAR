<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Login</title>
        <link rel='stylesheet' href='{{ asset('css/login.css') }}'>
    </head>
    <body>
        <div class='parent-container'>
         <div class='form-area'>
         <h1 class='Login-text'>Login</h1>
         <form action="{{route('login.create')}}" method="POST">
            @csrf
            <label>Email: </label>
            <br>
            <input type='email' name='email' placeholder='ex: wijaya@gmail.com'>
            <br>
            <label>Password: </label>
            <br>
            <input type='password' name='password'>
            <br><br>
            <button class='login-button' type='submit'> Login </button>
         </form>
         </div>
           <div class=bottom-text>
         <p class='register-text'> Jika belum mempunyai akun, silahkan <a href="{{route('register.step1')}}">klik disini</a></p>
         <p class='admin-text'> Untuk admin, silahkan <a href="{{route('admin-login')}}">klik disini</a></p>
           </div>
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
                <a href='{{ route('login')}}'><button>Kembali</button></a>
              </div>
            </div>
            @endif
        </div>
    </div>
        </div>
    </body>
</html>