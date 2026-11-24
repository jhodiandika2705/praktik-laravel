@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('content')
<div class="mx-auto max-w-3xl px-6 py-10">

    {{-- HEADER HALAMAN --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-800">
            Edit Surat Masuk
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Perbarui informasi surat masuk sesuai kebutuhan.
        </p>
    </div>

    {{-- FORM CARD --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">

        <form
            action="{{ route('surat-masuk.update', $surat->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            {{-- NOMOR SURAT --}}
            <div class="mb-6">
                <label for="nomor_surat" class="mb-2 block text-sm font-semibold text-slate-700">
                    Nomor Surat
                </label>

                <input
                    type="text"
                    id="nomor_surat"
                    name="nomor_surat"
                    value="{{ old('nomor_surat', $surat->{'nomor surat'}) }}"
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
                    value="{{ old('tanggal', $surat->tanggal) }}"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >

                @error('tanggal')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- PENGIRIM --}}
            <div class="mb-6">
                <label for="pengirim" class="mb-2 block text-sm font-semibold text-slate-700">
                    Pengirim
                </label>

                <input
                    type="text"
                    id="pengirim"
                    name="pengirim"
                    value="{{ old('pengirim', $surat->pengirim) }}"
                    placeholder="Masukkan nama pengirim"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >

                @error('pengirim')
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
                    value="{{ old('perihal', $surat->perihal) }}"
                    placeholder="Masukkan perihal surat"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >

                @error('perihal')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- KATEGORI SURAT --}}
            <div class="mb-6">
                <label for="category_id" class="mb-2 block text-sm font-semibold text-slate-700">
                    Kategori Surat
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-100"
                >
                    <option value="">Pilih kategori surat</option>

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $surat->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- LAMPIRAN LAMA --}}
            <div class="mb-4">
                <label class="mb-2 block text-sm font-semibold text-slate-700">
                    Lampiran Saat Ini
                </label>

                @if ($surat->lampiran)
                    <a
                        href="{{ asset('storage/' . $surat->lampiran) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 rounded-lg bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-700 transition hover:bg-blue-200"
                    >
                        Lihat Lampiran Saat Ini
                    </a>
                @else
                    <p class="text-sm text-slate-400">
                        Belum ada lampiran.
                    </p>
                @endif
            </div>

            {{-- UPLOAD LAMPIRAN BARU --}}
            <div class="mb-6">
                <label for="lampiran" class="mb-2 block text-sm font-semibold text-slate-700">
                    Ganti Lampiran
                </label>

                <input
                    type="file"
                    id="lampiran"
                    name="lampiran"
                    accept=".pdf,.jpg,.jpeg,.png"
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm text-slate-800 outline-none transition file:mr-4 file:rounded-lg file:border-0 file:bg-blue-100 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                >

                <p class="mt-2 text-xs text-slate-500">
                    Kosongkan jika tidak ingin mengganti lampiran. Format PDF, JPG, JPEG, PNG. Maksimal 2 MB.
                </p>

                @error('lampiran')
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
                >{{ old('keterangan', $surat->keterangan) }}</textarea>

                @error('keterangan')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- TOMBOL --}}
            <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-100 pt-6">

                <a
                    href="{{ route('surat-masuk.index') }}"
                    class="rounded-xl border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100"
                >
                    Kembali
                </a>

                <button
                    type="submit"
                    class="rounded-xl bg-blue-700 px-6 py-3 text-sm font-semibold text-white shadow-md shadow-blue-700/20 transition hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-200"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>
</div>
@endsection
