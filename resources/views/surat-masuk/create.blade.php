@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')

@section('content')
    <h1>Tambah Surat Masuk</h1>

    <form action="{{ route('surat-masuk.store') }}" method="POST">
        @csrf

        <div>
            <label for="nomor_surat">Nomor Surat</label>
            <input
                type="text"
                id="nomor_surat"
                name="nomor_surat"
                value="{{ old('nomor_surat') }}"
            >
            @error('nomor_surat')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="tanggal">Tanggal Surat</label>
            <input
                type="date"
                id="tanggal"
                name="tanggal"
                value="{{ old('tanggal') }}"
            >
            @error('tanggal')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="pengirim">Pengirim</label>
            <input
                type="text"
                id="pengirim"
                name="pengirim"
                value="{{ old('pengirim') }}"
            >
            @error('pengirim')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="perihal">Perihal</label>
            <input
                type="text"
                id="perihal"
                name="perihal"
                value="{{ old('perihal') }}"
            >
            @error('perihal')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="keterangan">Keterangan</label>
            <textarea
                id="keterangan"
                name="keterangan"
            >{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('surat-masuk.index') }}">Kembali</a>
    </form>
@endsection
