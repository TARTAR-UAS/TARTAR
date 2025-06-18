@if(session('success'))
    <div style="color: green; font-weight: bold; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color: red; font-weight: bold; margin-bottom: 10px;">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div style="color: red; margin-bottom: 10px;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>Pengajuan Studi</h2>

<form method="POST" action="{{ route('pengajuan-studi.store') }}">
    @csrf
    <h3>Pilih Mata Kuliah (min 3, max 5, total ≤ 20 SKS)</h3>

    @foreach($mataKuliah as $mk)
        <div>
            <input type="checkbox" name="mata_kuliah[]" value="{{ $mk->id }}" id="mk{{ $mk->id }}">
            <label for="mk{{ $mk->id }}">{{ $mk->nama }} ({{ $mk->sks }} SKS)</label>
        </div>
    @endforeach

    <br>
    <button type="submit">Ajukan</button>
</form>

<br>
<a href="{{ route('index') }}" class="back-button" style="padding: 8px 16px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">
    Kembali ke Beranda
</a>
