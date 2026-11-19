
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Surat</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 font-sans">

    <div class="flex min-h-screen">

        {{-- PANEL IDENTITAS APLIKASI --}}
        <div class="relative hidden w-1/2 flex-col justify-between overflow-hidden bg-slate-900 p-12 text-white lg:flex">

            <div class="absolute -right-32 -top-32 h-96 w-96 rounded-full bg-blue-600/20 blur-3xl"></div>

            <div class="relative z-10">
                <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-2xl font-bold">
                    S
                </div>

                <h1 class="text-2xl font-bold">
                    Sistem Informasi Surat
                </h1>

                <p class="mt-2 text-sm text-slate-400">
                    Pengelolaan Surat Masuk dan Surat Keluar
                </p>
            </div>

            <div class="relative z-10 max-w-lg">
                <p class="mb-4 text-sm font-semibold uppercase tracking-widest text-blue-400">
                    Digital Document Management
                </p>

                <h2 class="text-4xl font-bold leading-tight">
                    Kelola Surat Lebih Mudah, Cepat, dan Terstruktur.
                </h2>

                <p class="mt-5 leading-relaxed text-slate-400">
                    Sistem informasi untuk membantu pencatatan,
                    pengelolaan, dan pemantauan surat masuk
                    maupun surat keluar secara terorganisir.
                </p>
            </div>

            <div class="relative z-10 border-t border-slate-700 pt-5 text-xs text-slate-500">
                &copy; {{ date('Y') }} Sistem Informasi Surat
            </div>

        </div>

        {{-- PANEL FORM LOGIN --}}
        <div class="flex w-full items-center justify-center px-5 py-10 lg:w-1/2 lg:px-12">

            <div class="w-full max-w-md">

                {{-- IDENTITAS MOBILE --}}
                <div class="mb-8 text-center lg:hidden">
                    <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-700 text-2xl font-bold text-white">
                        S
                    </div>

                    <h1 class="text-xl font-bold text-slate-800">
                        Sistem Informasi Surat
                    </h1>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-200/60 sm:p-9">

                    <div class="mb-8">
                        <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600">
                            Selamat Datang
                        </p>

                        <h2 class="text-3xl font-bold text-slate-800">
                            Login Akun
                        </h2>

                        <p class="mt-2 text-sm text-slate-500">
                            Silakan masukkan email dan password Anda.
                        </p>
                    </div>

                    {{-- NOTIFIKASI BERHASIL --}}
                    @if (session('success'))
                        <div class="mb-5 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- NOTIFIKASI ERROR --}}
                    @if ($errors->any())
                        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    {{-- FORM LOGIN --}}
                    <form action="{{ url('/login') }}" method="POST">

                        @csrf

                        <div class="mb-5">
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email Anda"
                                required
                                autocomplete="email"
                                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            >
                        </div>

                        <div class="mb-7">
                            <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                                Password
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Masukkan password Anda"
                                required
                                autocomplete="current-password"
                                class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            >
                        </div>

                        <button
                            type="submit"
                            class="w-full rounded-xl bg-blue-700 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-blue-700/20 transition hover:bg-blue-800 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-200"
                        >
                            Masuk ke Sistem
                        </button>

                    </form>

                </div>

                <p class="mt-6 text-center text-xs text-slate-400">
                    Sistem Informasi Surat &bull; Aplikasi Pengelolaan Dokumen
                </p>

            </div>

        </div>

    </div>

</body>
</html>
