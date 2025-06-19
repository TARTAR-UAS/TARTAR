<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>biodata</title>
    <link rel='stylesheet' href='{{ asset('css/biodata.css') }}'>
    </head>
    <body>
    <div class='parent-container'>
        <div class ='header'>TARTAR</div>
        <div class= 'navbar-area'>
         <ul id='navbar'>
          <li><a href="{{ route('index') }}">Home</a></li>
          <li><a href="{{ route('biodata') }}">Biodata</a></li>
          <li><a href="{{ route('akademik') }}">Akademik</a></li>
          <li><a href="{{ route('pembayaran') }}">Pembayaran</a></li>
          <li><a href="{{ route('pengajuan-studi')}}">PengajuanStudi</a></li>
          <li><a href="{{ route('pengumuman') }}">Pengumuman</a></li>
          <li><a href="{{ route('status-wisuda') }}">Status Wisuda</a></li>
         </ul>
        </div>
        @auth
         <div class="logout-container">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                 <button type="submit" class="logout-button">Logout</button>
            </form>
          </div>
        @endauth
     <div class="biodata-area">
        <h2>Biodata Mahasiswa</h2>
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $mahasiswa->nama_depan }} {{ $mahasiswa->nama_belakang }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $mahasiswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $mahasiswa->agama }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $mahasiswa->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $mahasiswa->tempat_lahir }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $mahasiswa->alamat }}</td>
            </tr>
            <tr>
                <th>No Telp</th>
                <td>{{ $mahasiswa->no_telp }}</td>
            </tr>
            <tr>
                <th>Angkatan</th>
                <td>{{ $mahasiswa->angkatan }}</td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td>{{ $mahasiswa->program_studi }}</td>
            </tr>
            <tr>
                <th>Fakultas</th>
                <td>{{ $mahasiswa->fakultas }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $mahasiswa->status }}</td>
            </tr>
        </table>

        <h2>Data Orang Tua</h2>
        <table>
            <tr>
                <th>Nama Ayah</th>
                <td>{{ $mahasiswa->orangtua->nama_ayah }}</td>
            </tr>
            <tr>
                <th>No Telp Ayah</th>
                <td>{{ $mahasiswa->orangtua->no_telp_ayah }}</td>
             </tr>
            <tr>
                <th>Nama Ibu</th>
                <td>{{ $mahasiswa->orangtua->nama_ibu }}</td>
            </tr>
            <tr>
                <th>No Telp Ibu</th>
                <td>{{ $mahasiswa->orangtua->no_telp_ibu }}</td>
            </tr>
        </table>
        </div>

        <div class ="table-pendidikan">
        <h2>Riwayat Pendidikan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sekolah</th>
                    <th>Nilai Akhir</th>
                    <th>Tanggal Lulus</th>
                    <th>Jenis Sekolah</th>
                    <th>Jurusan</th>
                    <th>Lokasi Sekolah</th>
                </tr>
            </thead>
            <tbody>
            @forelse($mahasiswa->histori_pendidikan as $index => $pendidikan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pendidikan->nama_sekolah }}</td>
                    <td>{{ $pendidikan->nilai_akhir }}</td>
                    <td>{{ $pendidikan->tanggal_lulus }}</td>
                    <td>{{ $pendidikan->jenis_sekolah }}</td>
                    <td>{{ $pendidikan->jurusan }}</td>
                    <td>{{ $pendidikan->lokasi_sekolah }}</td>
                </tr>
                @empty
                    <h5>Belum ada riwayat pendidikan.</h5>
                @endforelse
            </tbody>
        </table>
        </div>
      <a href="{{ route('pilih-kategori') }}" class="ajukan-button"> Ajukan Perubahan Data </a> 
  </div>
</body>
</html>
