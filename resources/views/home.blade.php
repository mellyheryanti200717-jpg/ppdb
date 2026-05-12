@extends("layouts.frontend")
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
