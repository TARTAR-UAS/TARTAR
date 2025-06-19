<html>
<head>
    <title>Status Wisuda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

    @auth
    <div class="container mt-3 d-flex justify-content-end">
        <a href="{{ route('admin-index') }}" class="btn btn-secondary">Back</a>
    </div>
    @endauth

<body style="background-color: #bfc9d1;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 fs-2">Menulis Status Wisuda</h2>
                <form>
                    <div class="mb-3">
                        <label for="id_mahasiswa" class="form-label fs-5">ID Mahasiswa</label>
                        <input type="text" class="form-control form-control-lg" id="id_mahasiswa" placeholder="Masukkan ID Mahasiswa">
                    </div>
                    <div class="mb-3">
                        <label for="status_wisuda" class="form-label fs-5">Status Wisuda</label>
                        <textarea class="form-control form-control-lg" id="status_wisuda" rows="4" placeholder="Masukkan status wisuda..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>