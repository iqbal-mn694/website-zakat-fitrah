<?php

namespace App\Http\Controllers;

use App\Models\MustahikLainnya;
use App\Models\AturanZakat;
use Illuminate\Http\Request;

class MustahikLainnyaController extends Controller
{
    public function create()
    {
        $aturanZakat = AturanZakat::all();
        return view('mustahik-lainnya.create', compact('aturanZakat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mustahik' => 'required|string|max:255',
            'kategori' => 'required|string',
            'alamat' => 'required|string',
            'total_beras' => 'required|numeric',
            'total_uang' => 'required|numeric',
            'id_aturan_zakat' => 'required|exists:aturan_zakat,id_aturan_zakat'
        ]);

        MustahikLainnya::create([
            'nama_mustahik' => $request->nama_mustahik,
            'kategori' => $request->kategori,
            'alamat' => $request->alamat,
            'total_beras' => $request->total_beras,
            'total_uang' => $request->total_uang,
            'id_aturan_zakat' => $request->id_aturan_zakat
        ]);

        return redirect()->route('mustahik.index')
            ->with('success', 'Data Mustahik Lainnya berhasil ditambahkan');
    }
} 