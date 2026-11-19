@extends('layouts.app')

@section('title', 'Tambah Surat Keluar')

@section('content')
<div class="mx-auto max-w-3xl px-6 py-10">

    {{-- HEADER HALAMAN --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">
            Tambah Surat Keluar
        </h1>
        <p class="mt-2 text-sm text-slate-500">
            Silakan lengkapi formulir untuk menambahkan data surat keluar.
        </p>
    </div>

    {{-- FORM CARD --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

        <form action="{{ route('surat-keluar.store') }}" method="POST">
            @csrf

            {{-- NOMOR SURAT --}}
            <div class="mb-6">
                <label for="nomor_surat" class="mb-2 block text-sm font-semibold text-slate-700">
                    Nomor Surat
                </label>

                <input
                    type="text"
                    id="nomor_surat"
                    name="nomor_surat"
                    value="{{ old('nomor_surat') }}"
                    placeholder="Masukkan nomor surat"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >

                @error('nomor_surat')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- TANGGAL SURAT --}}
            <div class="mb-6">
                <label for="tanggal" class="mb-2 block text-sm font-semibold text-slate-700">
                    Tanggal Surat
                </label>

                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    value="{{ old('tanggal') }}"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >

                @error('tanggal')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- PERIHAL --}}
            <div class="mb-6">
                <label for="perihal" class="mb-2 block text-sm font-semibold text-slate-700">
                    Perihal
                </label>

                <input
                    type="text"
                    id="perihal"
                    name="perihal"
                    value="{{ old('perihal') }}"
                    placeholder="Masukkan perihal surat"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >

                @error('perihal')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- KETERANGAN --}}
            <div class="mb-8">
                <label for="keterangan" class="mb-2 block text-sm font-semibold text-slate-700">
                    Keterangan
                </label>

                <textarea
                    id="keterangan"
                    name="keterangan"
                    rows="4"
                    placeholder="Masukkan keterangan tambahan (opsional)"
                    class="w-full resize-y rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >{{ old('keterangan') }}</textarea>

                @error('keterangan')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- TOMBOL --}}
            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-100 pt-6">

                <a
                    href="{{ route('surat-keluar.index') }}"
                    class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-blue-700 px-6 py-3 text-sm font-semibold text-white shadow-md shadow-blue-700/20 transition hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-200"
                >
                    Simpan Surat
                </button>

            </div>

        </form>

    </div>
</div>
@endsection
