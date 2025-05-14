<?php

namespace App\Http\Controllers;

use App\Models\Muzzaki;
use Illuminate\Http\Request;

class MuzakkiController extends Controller
{
    public function index()
    {
        $muzzakis = Muzzaki::latest()
            ->paginate(10);

        return view('muzakki', compact('muzzakis'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $muzzakis = Muzzaki::where('nama_muzzaki', 'like', "%{$query}%")
            ->orWhere('keterangan', 'like', "%{$query}%")
            ->latest()
            ->paginate(10);

        if ($request->ajax()) {
            return view('muzakki-table', compact('muzzakis'))->render();
        }

        return view('muzakki', compact('muzzakis'));
    }
} 