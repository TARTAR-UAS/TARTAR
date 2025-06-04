<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/register/step3.css') }}'>
        <title>Register Step3</title>
    </head>
    <body>
        <h1 class='welcome-title'>Registrasi Akun</h1>
        <h2>Step 3: Masukkan Email dan Password </h2>
        <form action="{{route('register.step3.store')}}" method="POST">
            @csrf
            <label>Email: </label><br>
            <input type='email' name='email'><br>
            <label>Password: </label><br>
            <input type='password' name='password'><br>
            <button> Submit </button>
        </form>
    </body>
</html> 