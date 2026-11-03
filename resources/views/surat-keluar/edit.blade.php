@extends('layouts.app')

@section('title', 'Edit Surat Keluar')

@section('content')
    <h1>Edit Surat Keluar</h1>

    <form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nomor_surat">Nomor Surat</label>
            <input
                type="text"
                id="nomor_surat"
                name="nomor_surat"
                value="{{ old('nomor_surat', $surat->{'nomor surat'}) }}"
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
                value="{{ old('tanggal', $surat->tanggal) }}"
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
                value="{{ old('perihal', $surat->perihal) }}"
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
            >{{ old('keterangan', $surat->keterangan) }}</textarea>
            @error('keterangan')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('surat-keluar.index') }}">Batal</a>
    </form>
@endsection
