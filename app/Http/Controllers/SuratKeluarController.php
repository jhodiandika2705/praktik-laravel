<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratkeluar = OutgoingLetter::all();

        return view('surat-keluar.index', compact('suratkeluar'));
    }

    public function show($id)
    {
        $surat = OutgoingLetter::find($id);

        return view('surat-keluar.show', compact('surat'));
    }
}
