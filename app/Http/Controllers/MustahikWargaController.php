<?php

namespace App\Http\Controllers;

use App\Models\MustahikWarga;
use App\Models\AturanZakat;
use Illuminate\Http\Request;

class MustahikWargaController extends Controller
{
    public function create()
    {
        $aturanZakat = AturanZakat::all();
        return view('mustahik-warga.create', compact('aturanZakat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mustahik' => 'required|string|max:255',
            'kategori' => 'required|string',
            'hak' => 'required|numeric',
            'id_aturan_zakat' => 'required|exists:aturan_zakat,id_aturan_zakat'
        ]);

        MustahikWarga::create([
            'nama_mustahik' => $request->nama_mustahik,
            'kategori' => $request->kategori,
            'hak' => $request->hak,
            'id_aturan_zakat' => $request->id_aturan_zakat
        ]);

        return redirect()->route('mustahik.index')
            ->with('success', 'Data Mustahik Warga berhasil ditambahkan');
    }
} 