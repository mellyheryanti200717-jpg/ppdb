<?php

$controllersPath = __DIR__ . '/app/Http/Controllers/Admin/';
$viewsPath = __DIR__ . '/resources/views/admin/';

@mkdir($viewsPath . 'ppdb');

// Admin PPDB Controller
file_put_contents($controllersPath . 'PpdbController.php', '<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\PpdbRegistration;
class PpdbController extends Controller {
    public function index() {
        $ppdbs = PpdbRegistration::latest()->get();
        return view("admin.ppdb.index", compact("ppdbs"));
    }
    public function destroy($id) {
        PpdbRegistration::findOrFail($id)->delete();
        return redirect()->back()->with("success", "Data dihapus");
    }
}
');

// Admin PPDB View
file_put_contents($viewsPath . 'ppdb/index.blade.php', '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin PPDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route("home") }}">Lihat Website</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Data Pendaftar PPDB</h2>
        @if(session("success"))
            <div class="alert alert-success">{{ session("success") }}</div>
        @endif
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th><th>Nama Lengkap</th><th>L/P</th><th>Asal Sekolah</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ppdbs as $i => $ppdb)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $ppdb->nama_lengkap }}</td>
                    <td>{{ $ppdb->jenis_kelamin }}</td>
                    <td>{{ $ppdb->asal_sekolah }}</td>
                    <td>
                        <form action="{{ route("admin.ppdb.destroy", $ppdb->id) }}" method="POST">
                            @csrf @method("DELETE")
                            <button class="btn btn-sm btn-danger" onclick="return confirm(\'Hapus?\')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
');

echo "Admin skeleton generated!\n";
