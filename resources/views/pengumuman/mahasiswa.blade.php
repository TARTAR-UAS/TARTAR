
<div class="container mt-4">
    <a href="{{ route('index') }}" class="btn btn-secondary mb-3">Kembali ke Beranda</a>
    
    <h2 class="mb-4">Pengumuman</h2>

    @foreach($pengumuman as $item)
        <div class="mb-4">
            
            <h4 class="mb-2">{{ $item->judul }}</h4>
            <hr> 
            <p>{{ $item->isi }}</p>
            
        </div>
    @endforeach

</div>
