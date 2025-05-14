<?php

namespace App\Http\Controllers;

use App\Models\Mustahik_Warga;
use App\Models\Mustahik_Lainnya;
use Illuminate\Http\Request;

class MustahikController extends Controller
{
    public function index()
    {
        $mustahikWarga = Mustahik_Warga::paginate(10, ['*'], 'warga');
        $mustahikLainnya = Mustahik_Lainnya::paginate(10, ['*'], 'lainnya');
        
        return view('mustahik', compact('mustahikWarga', 'mustahikLainnya'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $type = $request->input('type', 'warga'); // default to warga if not specified
        
        if ($type === 'warga') {
            $data = Mustahik_Warga::where('nama_mustahik', 'like', "%{$query}%")
                ->orWhere('kategori', 'like', "%{$query}%")
                ->paginate(10, ['*'], 'warga');
            
            if ($request->ajax()) {
                return view('mustahik-warga-table', ['mustahikWarga' => $data])->render();
            }
        } else {
            $data = Mustahik_Lainnya::where('nama_mustahik', 'like', "%{$query}%")
                ->orWhere('kategori', 'like', "%{$query}%")
                ->paginate(10, ['*'], 'lainnya');
            
            if ($request->ajax()) {
                return view('mustahik-lainnya-table', ['mustahikLainnya' => $data])->render();
            }
        }

        return view('mustahik', [
            'mustahikWarga' => $type === 'warga' ? $data : Mustahik_Warga::paginate(10, ['*'], 'warga'),
            'mustahikLainnya' => $type === 'lainnya' ? $data : Mustahik_Lainnya::paginate(10, ['*'], 'lainnya')
        ]);
    }
} 