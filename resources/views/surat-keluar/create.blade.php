@extends('layouts.app')

@section('title', 'Tambah Surat Keluar')

@section('content')
    <h1>Tambah Surat Keluar</h1>

    <form action="{{ route('surat-keluar.store') }}" method="POST">
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
        <a href="{{ route('surat-keluar.index') }}">Kembali</a>
    </form>
@endsection
