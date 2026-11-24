@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')

<div class="min-h-screen bg-slate-100 px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-3xl">

        {{-- HEADER --}}
        <div class="mb-8">
            <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600">
                Manajemen Dokumen
            </p>
            <h1 class="text-3xl font-bold text-slate-800">
                Detail Surat Keluar
            </h1>
            <p class="mt-2 text-sm text-slate-500">
                Informasi lengkap surat keluar yang tersimpan dalam sistem.
            </p>
        </div>

        {{-- DETAIL CARD --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 bg-slate-900 px-6 py-5">
                <h2 class="text-lg font-bold text-white">
                    Informasi Surat
                </h2>
                <p class="mt-1 text-sm text-slate-300">
                    Data surat keluar
                </p>
            </div>

            <div class="space-y-6 p-6 sm:p-8">

                {{-- NOMOR SURAT --}}
                <div>
                    <p class="mb-1 text-sm font-semibold text-slate-500">
                        Nomor Surat
                    </p>
                    <p class="text-base font-semibold text-slate-800">
                        {{ $surat->{'nomor surat'} }}
                    </p>
                </div>

                <div class="border-t border-slate-100"></div>

                {{-- TANGGAL --}}
                <div>
                    <p class="mb-1 text-sm font-semibold text-slate-500">
                        Tanggal Surat
                    </p>
                    <p class="text-base text-slate-800">
                        {{ $surat->tanggal }}
                    </p>
                </div>

                <div class="border-t border-slate-100"></div>

                {{-- PERIHAL --}}
                <div>
                    <p class="mb-1 text-sm font-semibold text-slate-500">
                        Perihal
                    </p>
                    <p class="text-base text-slate-800">
                        {{ $surat->perihal }}
                    </p>
                </div>

                <div class="border-t border-slate-100"></div>

                {{-- KATEGORI --}}
                <div>
                    <p class="mb-1 text-sm font-semibold text-slate-500">
                        Kategori Surat
                    </p>

                    @if ($surat->category)
                        <span class="inline-block rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-700">
                            {{ $surat->category->nama }}
                        </span>
                    @else
                        <p class="text-base text-slate-400">
                            Belum dikategorikan
                        </p>
                    @endif
                </div>

                <div class="border-t border-slate-100"></div>

                {{-- KETERANGAN --}}
                <div>
                    <p class="mb-1 text-sm font-semibold text-slate-500">
                        Keterangan
                    </p>
                    <p class="whitespace-pre-line text-base text-slate-800">
                        {{ $surat->keterangan ?: 'Tidak ada keterangan.' }}
                    </p>
                </div>

                <div class="border-t border-slate-100"></div>

                {{-- LAMPIRAN --}}
                <div>
                    <p class="mb-2 text-sm font-semibold text-slate-500">
                        Lampiran Surat
                    </p>

                    @if ($surat->lampiran)
                        <a
                            href="{{ asset('storage/' . $surat->lampiran) }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 rounded-xl bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-700 transition hover:bg-blue-100"
                        >
                            <span>📎</span>
                            Lihat Lampiran
                        </a>
                    @else
                        <p class="text-sm text-slate-400">
                            Tidak ada lampiran.
                        </p>
                    @endif
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="flex justify-end border-t border-slate-200 bg-slate-50 px-6 py-5">
                <a
                    href="{{ route('surat-keluar.index') }}"
                    class="rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                >
                    Kembali
                </a>
            </div>

        </div>
    </div>
</div>

@endsection
