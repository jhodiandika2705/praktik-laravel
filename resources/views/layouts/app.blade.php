<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h2>Sistem Informasi Surat</h2>
        <hr>
        <!-- Menu navigasi dipindah ke sini agar konsisten di setiap halaman -->
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a> | 
            <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a> | 
            <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
    </footer>
</body>
</html>