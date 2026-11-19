<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') - Sistem Informasi Surat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 font-sans text-slate-800">

    {{-- HEADER DAN NAVBAR --}}
    <header class="bg-slate-900 text-white shadow-lg">

        <div class="mx-auto flex max-w-7xl flex-col gap-5 px-6 py-5 lg:flex-row lg:items-center lg:justify-between">

            {{-- IDENTITAS APLIKASI --}}
            <div>
                <h2 class="text-xl font-bold tracking-wide">
                    Sistem Informasi Surat
                </h2>

                <p class="mt-1 text-xs text-slate-400">
                    Pengelolaan Surat Masuk dan Surat Keluar
                </p>
            </div>

            {{-- NAVIGASI --}}
            <nav class="flex flex-wrap items-center gap-2">

                <a href="{{ route('dashboard') }}"
                   class="rounded-lg px-4 py-2 text-sm font-medium transition
                   {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    Dashboard
                </a>

                <a href="{{ route('surat-masuk.index') }}"
                   class="rounded-lg px-4 py-2 text-sm font-medium transition
                   {{ request()->routeIs('surat-masuk.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    Surat Masuk
                </a>

                <a href="{{ route('surat-keluar.index') }}"
                   class="rounded-lg px-4 py-2 text-sm font-medium transition
                   {{ request()->routeIs('surat-keluar.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                    Surat Keluar
                </a>

            </nav>

            {{-- INFORMASI PENGGUNA --}}
            <div class="flex flex-wrap items-center gap-4">

                @auth
                    <div>
                        <p class="text-sm font-semibold">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs capitalize text-slate-400">
                            {{ Auth::user()->role }}
                        </p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                            class="rounded-lg border border-red-400/40 bg-red-500/10 px-4 py-2 text-sm font-semibold text-red-300 transition hover:bg-red-600 hover:text-white">
                            Logout
                        </button>
                    </form>

                @else

                    <a href="{{ route('login') }}"
                       class="rounded-lg bg-blue-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">
                        Login
                    </a>

                @endauth

            </div>

        </div>

    </header>

    {{-- KONTEN HALAMAN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-slate-200 bg-white px-6 py-5 text-center text-sm text-slate-500">
        &copy; {{ date('Y') }} Sistem Informasi Surat. All Rights Reserved.
    </footer>

</body>
</html>
