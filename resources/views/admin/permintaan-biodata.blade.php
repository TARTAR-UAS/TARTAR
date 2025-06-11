<h2>Daftar Permintaan Perubahan Biodata</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @elseif (session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if($permintaan->isEmpty())
        <p>Tidak ada permintaan yang menunggu persetujuan.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Kategori</th>
                    <th>Data Baru</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permintaan as $p)
                    <tr>
                        <td>{{ $p->mahasiswa->nama_depan }} {{ $p->mahasiswa->nama_belakang }}</td>
                        <td>{{ ucfirst($p->kategori) }}</td>
                        <td>
                            <pre>{{ json_encode($p->data_baru, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                        </td>
                        <td>
                            <form action="{{ url('/admin/permintaan-biodata/setujui/' . $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Setujui</button>
                            </form>

                            <form action="{{ url('/admin/permintaan-biodata/tolak/' . $p->id) }}" method="POST" style="margin-top:10px;">
                                @csrf
                                <textarea name="alasan_penolakan" placeholder="Alasan penolakan" required></textarea>
                                <button type="submit">Tolak</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ route('admin-index') }}">Back</a>