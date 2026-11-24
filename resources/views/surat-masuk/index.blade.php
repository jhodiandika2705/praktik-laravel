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

        {{-- FILTER DAN PENCARIAN --}}
        <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

            <form action="{{ route('surat-masuk.index') }}" method="GET">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                    {{-- PENCARIAN --}}
                    <div class="md:col-span-2">
                        <label for="search" class="mb-2 block text-sm font-semibold text-slate-700">
                            Cari Surat
                        </label>

                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari nomor surat, pengirim, atau perihal..."
                            class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >
                    </div>

                    {{-- FILTER KATEGORI --}}
                    <div>
                        <label for="category_id" class="mb-2 block text-sm font-semibold text-slate-700">
                            Filter Kategori
                        </label>

                        <select
                            id="category_id"
                            name="category_id"
                            class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >
                            <option value="">Semua Kategori</option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->nama }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                </div>

                {{-- TOMBOL FILTER --}}
                <div class="mt-4 flex flex-wrap gap-3">

                    <button
                        type="submit"
                        class="rounded-xl bg-blue-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-800"
                    >
                        Cari / Filter
                    </button>

                    <a
                        href="{{ route('surat-masuk.index') }}"
                        class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                    >
                        Reset
                    </a>

                </div>

            </form>

        </div>

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

                <table class="w-full min-w-[1100px] text-left text-sm">

                    <thead class="bg-slate-900 text-white">

                        <tr>
                            <th class="px-6 py-4 font-semibold">No</th>
                            <th class="px-6 py-4 font-semibold">Nomor Surat</th>
                            <th class="px-6 py-4 font-semibold">Tanggal Surat</th>
                            <th class="px-6 py-4 font-semibold">Pengirim</th>
                            <th class="px-6 py-4 font-semibold">Perihal</th>
                            <th class="px-6 py-4 font-semibold">Kategori</th>
                            <th class="px-6 py-4 font-semibold">Lampiran</th>
                            <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($suratmasuk as $surat)

                            <tr class="transition hover:bg-blue-50/50">

                                <td class="px-6 py-4 text-slate-500">
                                    {{ $suratmasuk->firstItem() + $loop->index }}
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

                                {{-- KATEGORI --}}
                                <td class="px-6 py-4">
                                    @if ($surat->category)
                                        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                            {{ $surat->category->nama }}
                                        </span>
                                    @else
                                        <span class="text-xs text-slate-400">
                                            Belum dikategorikan
                                        </span>
                                    @endif
                                </td>

                                {{-- LAMPIRAN --}}
                                <td class="px-6 py-4">
                                    @if ($surat->lampiran)
                                        <a
                                            href="{{ asset('storage/' . $surat->lampiran) }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="font-semibold text-blue-600 transition hover:text-blue-800"
                                        >
                                            Lihat File
                                        </a>
                                    @else
                                        <span class="text-xs text-slate-400">
                                            Tidak ada
                                        </span>
                                    @endif
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
                                <td colspan="8" class="px-6 py-12 text-center">

                                    <div class="text-4xl">📂</div>

                                    <p class="mt-3 font-semibold text-slate-700">
                                        Data Surat Tidak Ditemukan
                                    </p>

                                    <p class="mt-1 text-sm text-slate-500">
                                        Coba ubah kata kunci pencarian atau filter kategori.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- PAGINATION --}}
            <div class="border-t border-slate-200 bg-slate-50 px-6 py-5">

                <div class="mb-4 text-xs text-slate-500">
                    Menampilkan
                    {{ $suratmasuk->firstItem() ?? 0 }}
                    sampai
                    {{ $suratmasuk->lastItem() ?? 0 }}
                    dari
                    {{ $suratmasuk->total() }}
                    data surat.
                </div>

                {{ $suratmasuk->links() }}

            </div>

            {{-- FOOTER TABEL --}}
            <div class="border-t border-slate-200 bg-white px-6 py-4">

                <p class="text-xs text-slate-500">
                    Sistem Informasi Surat — Data Surat Masuk
                </p>

            </div>

        </div>

    </div>

</div>

@endsection
