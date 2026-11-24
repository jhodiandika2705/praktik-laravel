<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index(Request $request)
    {
        $query = OutgoingLetter::with('category');

        // PENCARIAN
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nomor surat', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }

        // FILTER KATEGORI
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // PAGINATION 5 DATA
        $suratkeluar = $query->latest()
            ->paginate(5)
            ->withQueryString();

        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.index', compact(
            'suratkeluar',
            'categories'
        ));
    }

    // Menampilkan form tambah surat
    public function create()
    {
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.create', compact('categories'));
    }

    // Menyimpan surat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // UPLOAD LAMPIRAN
        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');
        }

        OutgoingLetter::create([
            'nomor surat' => $validated['nomor_surat'],
            'tanggal' => $validated['tanggal'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'lampiran' => $validated['lampiran'] ?? null,
        ]);

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $surat = OutgoingLetter::with('category')->findOrFail($id);

        return view('surat-keluar.show', compact('surat'));
    }

    // Menampilkan form edit surat
    public function edit($id)
    {
        $surat = OutgoingLetter::findOrFail($id);
        $categories = Category::orderBy('nama')->get();

        return view('surat-keluar.edit', compact(
            'surat',
            'categories'
        ));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $lampiranLama = $surat->lampiran;

        // UPLOAD LAMPIRAN BARU
        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');
        }

        $surat->update([
            'nomor surat' => $validated['nomor_surat'],
            'tanggal' => $validated['tanggal'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'lampiran' => $validated['lampiran'] ?? $lampiranLama,
        ]);

        // HAPUS LAMPIRAN LAMA JIKA DIGANTI
        if (
            $request->hasFile('lampiran') &&
            $lampiranLama
        ) {
            Storage::disk('public')->delete($lampiranLama);
        }

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        // HAPUS FILE LAMPIRAN
        if ($surat->lampiran) {
            Storage::disk('public')->delete($surat->lampiran);
        }

        $surat->delete();

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}
