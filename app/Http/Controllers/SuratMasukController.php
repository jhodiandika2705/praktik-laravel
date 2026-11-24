<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    // Menampilkan daftar surat masuk
    public function index(Request $request)
    {
        $query = IncomingLetter::with('category');

        // Pencarian surat
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nomor surat', 'like', "%{$search}%")
                    ->orWhere('pengirim', 'like', "%{$search}%")
                    ->orWhere('perihal', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Pagination 5 data per halaman
        $suratmasuk = $query
            ->latest()
            ->paginate(5)
            ->withQueryString();

        $categories = Category::orderBy('nama')->get();

        return view('surat-masuk.index', compact(
            'suratmasuk',
            'categories'
        ));
    }

    // Menampilkan form tambah surat
    public function create()
    {
        $categories = Category::orderBy('nama')->get();

        return view('surat-masuk.create', compact('categories'));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Upload lampiran jika tersedia
        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat', 'public');
        }

        IncomingLetter::create([
            'nomor surat' => $validated['nomor_surat'],
            'tanggal' => $validated['tanggal'],
            'pengirim' => $validated['pengirim'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'lampiran' => $validated['lampiran'] ?? null,
        ]);

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil ditambahkan.');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $surat = IncomingLetter::with('category')->findOrFail($id);

        return view('surat-masuk.show', compact('surat'));
    }

    // Menampilkan form edit surat
    public function edit($id)
    {
        $surat = IncomingLetter::findOrFail($id);
        $categories = Category::orderBy('nama')->get();

        return view('surat-masuk.edit', compact(
            'surat',
            'categories'
        ));
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
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Upload lampiran baru jika tersedia
        if ($request->hasFile('lampiran')) {
            // Hapus lampiran lama
            if ($surat->lampiran) {
                Storage::disk('public')->delete($surat->lampiran);
            }

            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat', 'public');
        }

        $surat->update([
            'nomor surat' => $validated['nomor_surat'],
            'tanggal' => $validated['tanggal'],
            'pengirim' => $validated['pengirim'],
            'perihal' => $validated['perihal'],
            'keterangan' => $validated['keterangan'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'lampiran' => $validated['lampiran'] ?? $surat->lampiran,
        ]);

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        // Hapus file lampiran jika tersedia
        if ($surat->lampiran) {
            Storage::disk('public')->delete($surat->lampiran);
        }

        $surat->delete();

        return redirect()
            ->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil dihapus.');
    }
}
