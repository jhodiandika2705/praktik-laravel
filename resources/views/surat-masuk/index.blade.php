@extends('layouts.app')

@section('title', 'Surat Masuk')

@section('content')

<div class="min-h-screen bg-slate-100 px-4 py-8 sm:px-6 lg:px-8">

    <div class="mx-auto max-w-7xl">

        {{-- JUDUL HALAMAN --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600">
                    Manajemen Dokumen
                </p>

                <h1 class="text-3xl font-bold text-slate-800">
                    Surat Masuk
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Kelola dan pantau seluruh data surat yang diterima.
                </p>
            </div>

            {{-- TOMBOL TAMBAH: KHUSUS PETUGAS --}}
            @can('manage-letters')
                <a href="{{ route('surat-masuk.create') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-xl bg-blue-700 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800 hover:shadow-md">

                    <span class="text-lg">+</span>
                    Tambah Surat

                </a>
            @endcan

        </div>

        {{-- NOTIFIKASI BERHASIL --}}
        @if (session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-800">

                <span class="text-lg">✓</span>

                <p class="font-medium">
                    {{ session('success') }}
                </p>

            </div>
        @endif

        {{-- TABEL DATA SURAT --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- HEADER TABEL --}}
            <div class="border-b border-slate-200 px-6 py-5">

                <h2 class="text-lg font-bold text-slate-800">
                    Daftar Surat Masuk
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi seluruh surat masuk yang tersimpan dalam sistem.
                </p>

            </div>

            {{-- AREA TABEL --}}
            <div class="overflow-x-auto">

                <table class="w-full min-w-[850px] text-left text-sm">

                    <thead class="bg-slate-900 text-white">

                        <tr>
                            <th class="px-6 py-4 font-semibold">No</th>
                            <th class="px-6 py-4 font-semibold">Nomor Surat</th>
                            <th class="px-6 py-4 font-semibold">Tanggal Surat</th>
                            <th class="px-6 py-4 font-semibold">Pengirim</th>
                            <th class="px-6 py-4 font-semibold">Perihal</th>
                            <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($suratmasuk as $surat)

                            <tr class="transition hover:bg-blue-50/50">

                                <td class="px-6 py-4 text-slate-500">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-slate-800">
                                    {{ $surat->{'nomor surat'} }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-slate-600">
                                    {{ $surat->tanggal }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $surat->pengirim }}
                                </td>

                                <td class="px-6 py-4 text-slate-600">
                                    {{ $surat->perihal }}
                                </td>

                                {{-- AKSI --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center justify-center gap-2">

                                        {{-- DETAIL: SEMUA PENGGUNA LOGIN --}}
                                        <a href="{{ route('surat-masuk.show', $surat->id) }}"
                                           class="rounded-lg bg-blue-100 px-3 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-200">
                                            Detail
                                        </a>

                                        {{-- EDIT DAN HAPUS: KHUSUS PETUGAS --}}
                                        @can('manage-letters')

                                            <a href="{{ route('surat-masuk.edit', $surat->id) }}"
                                               class="rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-200">
                                                Edit
                                            </a>

                                            <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat masuk ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="rounded-lg bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-200">
                                                    Hapus
                                                </button>

                                            </form>

                                        @endcan

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">

                                    <div class="text-4xl">📂</div>

                                    <p class="mt-3 font-semibold text-slate-700">
                                        Belum Ada Data Surat Masuk
                                    </p>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Data surat masuk yang tersimpan akan ditampilkan di sini.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- FOOTER TABEL --}}
            <div class="border-t border-slate-200 bg-slate-50 px-6 py-4">

                <p class="text-xs text-slate-500">
                    Sistem Informasi Surat — Data Surat Masuk
                </p>

            </div>

        </div>

    </div>

</div>

@endsection
