<a href="{{ url('/admin/index') }}" class="btn btn-secondary mb-3">← Kembali ke Dashboard</a>
<h2>Kelola Pengumuman</h2>

<a href="{{ url('/admin/pengumuman/create') }}" class="btn btn-primary mb-3">Tambah Pengumuman</a>

@foreach($pengumuman as $item)
    <div class="card mb-2">
        <div class="card-body">
            <h5>{{ $item->judul }}</h5>
            <p>{{ $item->isi }}</p>

            <a href="{{ url('/admin/pengumuman/edit/'.$item->id) }}" class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ url('/admin/pengumuman/'.$item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
            </form>
        </div>
    </div>
@endforeach

