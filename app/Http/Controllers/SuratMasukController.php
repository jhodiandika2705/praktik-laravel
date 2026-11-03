<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    // Menampilkan daftar surat masuk
    public function index()
    {
        $suratmasuk = IncomingLetter::all();

        return view('surat-masuk.index', compact('suratmasuk'));
    }

    // Menampilkan form tambah surat
    public function create()
    {
        return view('surat-masuk.create');
    }

    // Menyimpan surat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        IncomingLetter::create([
            'nomor surat' => $validated['nomor_surat'],
            'tanggal' => $validated['tanggal'],
            'pengirim' => $validated['pengirim'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        return view('surat-masuk.show', compact('surat'));
    }

    // Menampilkan form edit surat
    public function edit($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        return view('surat-masuk.edit', compact('surat'));
    }

    // Memperbarui data surat
    public function update(Request $request, $id)
    {
        $surat = IncomingLetter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat->update([
            'nomor surat' => $validated['nomor_surat'],
            'tanggal' => $validated['tanggal'],
            'pengirim' => $validated['pengirim'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
        ]);

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        $surat->delete();

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
