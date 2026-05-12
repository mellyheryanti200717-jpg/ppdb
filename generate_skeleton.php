<?php

// Script to generate skeleton for controllers and views

$controllersPath = __DIR__ . '/app/Http/Controllers/';
$viewsPath = __DIR__ . '/resources/views/';

// 1. Frontend Controllers
file_put_contents($controllersPath . 'HomeController.php', '<?php
namespace App\Http\Controllers;
use App\Models\Post;
class HomeController extends Controller {
    public function index() {
        $posts = Post::latest()->take(3)->get();
        return view("home", compact("posts"));
    }
}
');

file_put_contents($controllersPath . 'WebPpdbController.php', '<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PpdbRegistration;
class WebPpdbController extends Controller {
    public function create() {
        return view("ppdb.create");
    }
    public function store(Request $request) {
        $data = $request->validate([
            "nama_lengkap" => "required",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required|date",
            "alamat" => "required",
            "asal_sekolah" => "required",
            "no_telp" => "required",
        ]);
        PpdbRegistration::create($data);
        return redirect()->route("ppdb.success");
    }
    public function success() {
        return view("ppdb.success");
    }
}
');

// Create directories for views
@mkdir($viewsPath . 'layouts');
@mkdir($viewsPath . 'ppdb');
@mkdir($viewsPath . 'admin');

// Layout Frontend
file_put_contents($viewsPath . 'layouts/frontend.blade.php', '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil SMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero { background: url("https://via.placeholder.com/1200x500") no-repeat center center; background-size: cover; color: white; padding: 100px 0; text-align: center; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route("home") }}">SMA Negeri 1</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route("home") }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route("ppdb.create") }}">PPDB</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route("login") }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield("content")
    </main>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; {{ date("Y") }} SMA Negeri 1. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
');

// Home View
file_put_contents($viewsPath . 'home.blade.php', '@extends("layouts.frontend")
@section("content")
<div class="hero">
    <div class="container">
        <h1 class="display-4 fw-bold">Selamat Datang di SMA Negeri 1</h1>
        <p class="lead">Mencetak generasi cerdas, berakhlak, dan berprestasi.</p>
        <a href="{{ route("ppdb.create") }}" class="btn btn-warning btn-lg">Daftar PPDB Sekarang</a>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Sambutan Kepala Sekolah</h2>
            <p>Selamat datang di website resmi SMA Negeri 1. Kami berkomitmen untuk memberikan pendidikan terbaik bagi putra-putri bangsa.</p>
        </div>
        <div class="col-md-4">
            <h2>Berita Terbaru</h2>
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item">{{ $post->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
');

// PPDB Create View
file_put_contents($viewsPath . 'ppdb/create.blade.php', '@extends("layouts.frontend")
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
');

// PPDB Success View
file_put_contents($viewsPath . 'ppdb/success.blade.php', '@extends("layouts.frontend")
@section("content")
<div class="container mt-5 text-center">
    <div class="alert alert-success">
        <h2>Pendaftaran Berhasil!</h2>
        <p>Terima kasih telah mendaftar di SMA Negeri 1. Data Anda telah kami terima.</p>
        <a href="{{ route("home") }}" class="btn btn-primary">Kembali ke Home</a>
    </div>
</div>
@endsection
');

echo "Skeleton generated successfully!\n";
