@extends('layouts.app')

@section('title', 'Halaman Surat Masuk')

@section('content')

    <h1>Halaman Surat Masuk</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    {{-- Tombol Tambah hanya untuk Petugas --}}
    @can('manage-letters')
        <a href="{{ route('surat-masuk.create') }}">
            <button type="button">Tambah Surat</button>
        </a>
    @endcan

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($suratmasuk as $surat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->{'nomor surat'} }}</td>
                    <td>{{ $surat->tanggal }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ $surat->perihal }}</td>

                    <td>
                        {{-- Detail bisa diakses Petugas dan Pembaca --}}
                        <a href="{{ route('surat-masuk.show', $surat->id) }}">
                            Detail
                        </a>

                        {{-- Edit dan Hapus hanya untuk Petugas --}}
                        @can('manage-letters')
                            |
                            <a href="{{ route('surat-masuk.edit', $surat->id) }}">
                                Edit
                            </a>

                            |

                            <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat masuk ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit">Hapus</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        Belum ada data surat masuk.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
