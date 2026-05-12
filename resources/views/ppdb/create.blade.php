@extends("layouts.frontend")
@section("content")
<div class="container mt-5">
    <h2 class="mb-4 text-center">Form Pendaftaran PPDB Online</h2>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route("ppdb.store") }}" method="POST">
                @csrf
                <div class="mb-3"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" class="form-control" required></div>
                <div class="mb-3"><label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3"><label>Tempat Lahir</label><input type="text" name="tempat_lahir" class="form-control" required></div>
                <div class="mb-3"><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="form-control" required></div>
                <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control" required></textarea></div>
                <div class="mb-3"><label>Asal Sekolah</label><input type="text" name="asal_sekolah" class="form-control" required></div>
                <div class="mb-3"><label>No. Telp</label><input type="text" name="no_telp" class="form-control" required></div>
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
        </div>
    </div>
</div>
@endsection
