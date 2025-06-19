<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" href="{{ asset('css/form-wisuda.css') }}">
  <title>Formulir Pendaftaran Wisuda</title>
</head>
<body>
  <div class='parent-container'>
    <div class='top-text'>
      <h2>Formulir Wisuda</h2>
    </div>

    <div class='form-area'>
      <form action="{{ route('form-wisuda-store') }}" method="POST">
        @csrf

        <label>IPK Akhir: </label><br>
        <input type="text" name="ipk_akhir" placeholder="Contoh: 3.75"><br>

        <label>Tanggal Pengajuan: </label><br>
        <input type="date" name="tanggal_pengajuan"><br>

        <div class="button-wrapper">
          <a href="{{ route('status-wisuda') }}">
            <button class="back-button" type="button">Back</button>
          </a>
          <button class="next-button" type="submit">Ajukan Wisuda</button>
        </div>
      </form>

      @if ($errors->any())
      <div class='alert-container'>
        <div class="alert-box">
          <h2><strong>Error!</strong></h2>
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <a href='{{ route('form-wisuda') }}'><button>Kembali</button></a>
        </div>
      </div>
      @endif
    </div>
  </div>
</body>
</html>