<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Data Siswa') - SmartSekolah</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Header Navbar Biru Khas SmartSekolah Persis Foto -->
    <header class="navbar">
        <div class="navbar-container">
            <a href="{{ url('/siswa') }}" class="navbar-brand">SmartSekolah</a>
            <ul class="navbar-menu">
                <li><a href="{{ url('/siswa') }}" class="{{ request()->is('siswa*') || request()->is('/') ? 'active' : '' }}">Data Siswa</a></li>
            </ul>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="container">
        @yield('konten')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} SmartSekolah &bull; Praktikum Laravel CRUD</p>
    </footer>

</body>
</html>
