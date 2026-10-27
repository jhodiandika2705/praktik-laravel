
@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
    <h1>Detail Surat Keluar</h1>

    @if ($surat)
        <p>
            <strong>Nomor Surat:</strong>
            {{ $surat->{'nomor surat'} }}
        </p>

        <p>
            <strong>Tanggal:</strong>
            {{ $surat->tanggal }}
        </p>

        <p>
            <strong>Tujuan:</strong>
            {{ $surat->tujuan }}
        </p>

        <p>
            <strong>Perihal:</strong>
            {{ $surat->perihal }}
        </p>

        <p>
            <strong>Keterangan:</strong>
            {{ $surat->keterangan }}
        </p>
    @else
        <p>Surat keluar tidak ditemukan.</p>
    @endif

    <br>

    <a href="{{ route('surat-keluar.index') }}">Kembali</a>
@endsection
