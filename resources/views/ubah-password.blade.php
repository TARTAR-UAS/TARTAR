<form action="{{ route('ubah-password') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Password Baru</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
