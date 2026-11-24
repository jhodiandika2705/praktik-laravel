@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')

<div class="min-h-screen bg-slate-100 px-4 py-10 sm:px-6 lg:px-8">

    <div class="mx-auto max-w-3xl">

        {{-- HEADER --}}
        <div class="mb-8">
            <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-blue-600">
                Manajemen Dokumen
            </p>

            <h1 class="text-3xl font-bold text-slate-800">
                Detail Surat Masuk
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Informasi lengkap dokumen surat masuk.
            </p>
        </div>

        {{-- DETAIL CARD --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 bg-slate-900 px-6 py-5">
                <h2 class="text-lg font-bold text-white">
                    Informasi Surat
                </h2>
                <p class="mt-1 text-sm text-slate-300">
                    Data surat yang tersimpan dalam sistem.
                </p>
            </div>

            <div class="space-y-6 p-6 sm:p-8">

                {{-- NOMOR SURAT --}}
                <div>
                    <p class="text-sm font-semibold text-slate-500">
                        Nomor Surat
                    </p>
                    <p class="mt-2 text-base font-semibold text-slate-800">
                        {{ $surat->{'nomor surat'} }}
                    </p>
                </div>

                {{-- TANGGAL --}}
                <div>
                    <p class="text-sm font-semibold text-slate-500">
                        Tanggal Surat
                    </p>
                    <p class="mt-2 text-base text-slate-800">
                        {{ $surat->tanggal }}
                    </p>
                </div>

                {{-- PENGIRIM --}}
                <div>
                    <p class="text-sm font-semibold text-slate-500">
                        Pengirim
                    </p>
                    <p class="mt-2 text-base text-slate-800">
                        {{ $surat->pengirim }}
                    </p>
                </div>

                {{-- PERIHAL --}}
                <div>
                    <p class="text-sm font-semibold text-slate-500">
                        Perihal
                    </p>
                    <p class="mt-2 text-base text-slate-800">
                        {{ $surat->perihal }}
                    </p>
                </div>

                {{-- KATEGORI --}}
                <div>
                    <p class="text-sm font-semibold text-slate-500">
                        Kategori Surat
                    </p>

                    <div class="mt-2">
                        @if ($surat->category)
                            <span class="rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700">
                                {{ $surat->category->nama }}
                            </span>
                        @else
                            <span class="text-sm text-slate-400">
                                Belum dikategorikan
                            </span>
                        @endif
                    </div>
                </div>

                {{-- KETERANGAN --}}
                <div>
                    <p class="text-sm font-semibold text-slate-500">
                        Keterangan
                    </p>
                    <p class="mt-2 whitespace-pre-line text-base text-slate-800">
                        {{ $surat->keterangan ?: 'Tidak ada keterangan.' }}
                    </p>
                </div>

                {{-- LAMPIRAN --}}
                <div>
                    <p class="text-sm font-semibold text-slate-500">
                        Lampiran Surat
                    </p>

                    <div class="mt-2">
                        @if ($surat->lampiran)
                            <a
                                href="{{ asset('storage/' . $surat->lampiran) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 rounded-xl bg-blue-100 px-4 py-3 text-sm font-semibold text-blue-700 transition hover:bg-blue-200"
                            >
                                Lihat / Unduh Lampiran
                            </a>
                        @else
                            <p class="text-sm text-slate-400">
                                Tidak ada lampiran.
                            </p>
                        @endif
                    </div>
                </div>

            </div>

            {{-- FOOTER --}}
            <div class="flex justify-end border-t border-slate-200 bg-slate-50 px-6 py-5">

                <a
                    href="{{ route('surat-masuk.index') }}"
                    class="rounded-xl bg-blue-700 px-6 py-3 text-sm font-semibold text-white transition hover:bg-blue-800"
                >
                    Kembali ke Daftar Surat Masuk
                </a>

            </div>

        </div>

    </div>

</div>

@endsection
