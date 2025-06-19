<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Akademik</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      display: flex;
    }

    /* Sidebar Style */
    .sidebar {
      width: 250px;
      background-color: #f9f9f9;
      border-right: 1px solid #ccc;
      padding: 15px;
      height: 100vh;
    }

    .sidebar ul {
      list-style: none;
      padding-left: 0;
    }

    .sidebar li {
      margin: 8px 0;
      cursor: pointer;
    }

    .sidebar li img {
      vertical-align: middle;
      margin-right: 5px;
    }

    .sidebar li ul {
      margin-left: 20px;
      display: none;
    }

    .sidebar li.active > ul {
      display: block;
    }

    .sidebar .folder::before {
      content: url('https://img.icons8.com/fluency/16/folder-invoices.png');
      margin-right: 5px;
    }

    .sidebar .item::before {
      content: url('https://img.icons8.com/ios/12/plus-math.png');
      margin-right: 5px;
    }

    .sidebar a {
      color: black;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="bar">
    <ul>
      <li class="folder" onclick="toggle(this)">
        Akademik
        <ul>
          <li class="item"><a href="{{ route('akademik.histori') }}">Histori Nilai</a></li>
          <li class="item"><a href="{{ route('akademik.jadwal') }}">Jadwal Kuliah</a></li>

          <li class="item"><a href="{{ route('akademik.kehadiran') }}">Kehadiran</a></li>
        
          <li class="item"><a href="{{ route('akademik.status-kuliah') }}">Status Kuliah</a></li>
          <li class="item"><a href="{{ route('akademik.transkrip') }}">Transkrip</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <!-- Konten -->
  <div class="content" style="flex: 1; padding: 20px;">
    @yield('content')
  </div>

  <!-- Script Toggle -->
  <script>
    function toggle(element) {
      element.classList.toggle('active');
    }
  </script>

  @stack('scripts')
</body>
</html>
