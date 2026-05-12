@extends("layouts.frontend")
@section("content")
<div class="container mt-5 text-center">
    <div class="alert alert-success">
        <h2>Pendaftaran Berhasil!</h2>
        <p>Terima kasih telah mendaftar di SMA Negeri 1. Data Anda telah kami terima.</p>
        <a href="{{ route("home") }}" class="btn btn-primary">Kembali ke Home</a>
    </div>
</div>
@endsection
