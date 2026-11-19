@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="min-h-screen bg-slate-100 px-4 py-8 sm:px-6 lg:px-8">

    <div class="mx-auto max-w-7xl">

        {{-- Judul Dashboard --}}
        <div class="mb-8">
            <p class="mb-2 text-sm font-medium text-blue-600">
                SISTEM INFORMASI SURAT
            </p>

            <h1 class="text-3xl font-bold tracking-tight text-slate-800">
                Dashboard
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Selamat datang di Sistem Informasi Surat.
                Kelola data surat masuk dan surat keluar dengan mudah.
            </p>
        </div>

        {{-- Kartu Sambutan --}}
        <div class="mb-8 overflow-hidden rounded-2xl bg-gradient-to-r from-blue-900 to-blue-700 p-8 shadow-lg">
            <div class="max-w-2xl">
                <p class="mb-2 text-sm font-medium text-blue-200">
                    SELAMAT DATANG
                </p>

                <h2 class="text-2xl font-bold text-white sm:text-3xl">
                    Halo, {{ Auth::user()->name }}!
                </h2>

                <p class="mt-3 text-sm leading-relaxed text-blue-100">
                    Anda login sebagai
                    <span class="font-semibold text-white">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>.
                    Selamat bekerja dan semoga aktivitas Anda berjalan lancar.
                </p>
            </div>
        </div>

        {{-- Menu Utama --}}
        <div class="mb-5">
            <h2 class="text-xl font-bold text-slate-800">
                Menu Utama
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Pilih menu untuk mengelola data surat.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            {{-- Surat Masuk --}}
            <a href="{{ route('surat-masuk.index') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-blue-300 hover:shadow-lg">

                <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-xl bg-blue-100 text-2xl">
                    📥
                </div>

                <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-700">
                    Surat Masuk
                </h3>

                <p class="mt-2 text-sm leading-relaxed text-slate-500">
                    Lihat dan kelola seluruh data surat yang diterima.
                </p>

                <p class="mt-5 text-sm font-semibold text-blue-700">
                    Buka Surat Masuk →
                </p>
            </a>

            {{-- Surat Keluar --}}
            <a href="{{ route('surat-keluar.index') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-300 hover:shadow-lg">

                <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-100 text-2xl">
                    📤
                </div>

                <h3 class="text-lg font-bold text-slate-800 group-hover:text-emerald-700">
                    Surat Keluar
                </h3>

                <p class="mt-2 text-sm leading-relaxed text-slate-500">
                    Lihat dan kelola seluruh data surat yang diterbitkan.
                </p>

                <p class="mt-5 text-sm font-semibold text-emerald-700">
                    Buka Surat Keluar →
                </p>
            </a>

        </div>

        {{-- Informasi --}}
        <div class="mt-8 rounded-xl border border-blue-100 bg-blue-50 p-5">
            <h3 class="font-semibold text-blue-900">
                Informasi Sistem
            </h3>

            <p class="mt-2 text-sm leading-relaxed text-blue-800">
                Sistem Informasi Surat digunakan untuk membantu
                pencatatan dan pengelolaan surat masuk serta surat keluar
                secara terstruktur.
            </p>
        </div>

    </div>
</div>

@endsection
