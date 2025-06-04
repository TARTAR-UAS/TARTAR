<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel='stylesheet' href='{{ asset('css/register/step2.css') }}'>
        <title>Register Step2</title>
    </head>
    <body>
        <h1 class='welcome-title'>Registrasi Akun</h1>
        <h2>Step 2: Isi Prodi </h2>
        <form action="{{route('register.step2.store')}}" method="POST">
            @csrf
            <label>Fakultas: </label><br>
            <input type='text' name='fakultas'><br>
            <label>Program Studi: </label><br>
            <input type='text' name='program_studi'><br>
            <button> Next </button>
        </form>
    </body>
</html> 