<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index()
    {
        $suratkeluar = OutgoingLetter::all();

        return view('surat-keluar.index', compact('suratkeluar'));
    }

    // Menampilkan form tambah surat
    public function create()
    {
        return view('surat-keluar.create');
    }

    // Menyimpan surat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        OutgoingLetter::create([
            'nomor surat' => $validated['nomor_surat'],
            'tanggal' => $validated['tanggal'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.show', compact('surat'));
    }

    // Menampilkan form edit surat
    public function edit($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.edit', compact('surat'));
    }

    // Memperbarui data surat
    public function update(Request $request, $id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat->update([
            'nomor surat' => $validated['nomor_surat'],
            'tanggal' => $validated['tanggal'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $surat->delete();

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}
