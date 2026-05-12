<!DOCTYPE html>
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
