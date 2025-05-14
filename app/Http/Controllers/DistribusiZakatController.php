<?php

namespace App\Http\Controllers;

use App\Models\Bayar_Zakat;
use Illuminate\Http\Request;

class DistribusiZakatController extends Controller
{
    public function index()
    {
        $pengumpulanZakat = Bayar_Zakat::orderBy('created_at', 'desc')
            ->paginate(10);
        
        // Hitung total
        $totalBeras = Bayar_Zakat::where('jenis_bayar', 'beras')->sum('bayar_beras');
        $totalUang = Bayar_Zakat::where('jenis_bayar', 'uang')->sum('bayar_uang');
        
        return view('distribusi-zakat', compact('pengumpulanZakat', 'totalBeras', 'totalUang'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $pengumpulanZakat = Bayar_Zakat::where(function($q) use ($query) {
                $q->where('nama_kk', 'like', "%{$query}%")
                  ->orWhere('jenis_bayar', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if ($request->ajax()) {
            return view('distribusi-zakat-table', compact('pengumpulanZakat'))->render();
        }

        // Hitung total
        $totalBeras = Bayar_Zakat::where('jenis_bayar', 'beras')->sum('bayar_beras');
        $totalUang = Bayar_Zakat::where('jenis_bayar', 'uang')->sum('bayar_uang');

        return view('distribusi-zakat', compact('pengumpulanZakat', 'totalBeras', 'totalUang'));
    }
} 