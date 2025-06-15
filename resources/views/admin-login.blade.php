<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Admin Login</title>
        <link rel='stylesheet' href='{{ asset('css/admin-login.css') }}'>
    </head>
    <body>
        <div class='parent-container'>
         <div class='form-area'>
         <h1 class='Login-text'>Login Admin</h1>
         <form action="{{route('admin-login.create')}}" method="POST">
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
         <p class='back-text'>silahkan <a href="{{route('login')}}"> klik disini </a> untuk kembali ke login biasa</p>
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
                <a href='{{ route('admin-login')}}'><button>Kembali</button></a>
              </div>
            </div>
            @endif
        </div>
    </div>
        </div>
    </body>
</html>