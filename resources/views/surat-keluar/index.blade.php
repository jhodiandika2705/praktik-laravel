
@extends('layouts.app')

@section('title', 'Halaman Surat Keluar')

@section('content')
    <h1>Halaman Surat Keluar</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('surat-keluar.create') }}">
        <button type="button">Tambah Surat</button>
    </a>

    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($suratkeluar as $surat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->{'nomor surat'} }}</td>
                    <td>{{ $surat->tanggal }}</td>
                    <td>{{ $surat->perihal }}</td>
                    
                    <td>
                            <a href="{{ route('surat-keluar.show', $surat->id) }}">
                                                Detail
                            </a>

                            |

                            <a href="{{ route('surat-keluar.edit', $surat->id) }}">
                                Edit
                            </a>

                            |

                            <form action="{{ route('surat-keluar.destroy', $surat->id) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">

        @csrf
        @method('DELETE')

        <button type="submit">Hapus</button>
    </form>
</td>

                    
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        Belum ada data surat keluar.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
