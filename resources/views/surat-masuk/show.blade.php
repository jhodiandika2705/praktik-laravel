
@extends('layouts.app')

@section('title', 'Detail Surat Masuk')

@section('content')

    <h1>Detail Surat Masuk</h1>

    @if ($surat)

        <p>
            <strong>Nomor Surat:</strong>
            {{ $surat->nomor_surat }}
        </p>

        <p>
            <strong>Tanggal:</strong>
            {{ $surat->tanggal }}
        </p>

        <p>
            <strong>Pengirim:</strong>
            {{ $surat->pengirim }}
        </p>

        <p>
            <strong>Perihal:</strong>
            {{ $surat->perihal }}
        </p>

    @else

        <p>Surat keluar tidak ditemukan.</p>

    @endif

    <br>

    <a href="{{ route('surat-keluar.index') }}">
        Kembali ke Daftar Surat Keluar
    </a>

@endsection
