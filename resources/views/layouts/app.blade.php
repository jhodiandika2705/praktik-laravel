<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h2>Sistem Informasi Surat</h2>
        <hr>

        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a> |

            <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a> |

            <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
        </nav>

        <hr>

        @auth
            <p>
                Selamat datang, <strong>{{ Auth::user()->name }}</strong>
                ({{ Auth::user()->role }})
            </p>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
    </footer>
</body>
</html>
