<?php

namespace App\Http\Controllers;

use App\Models\BayarZakat;
use App\Models\MustahikWarga;
use App\Models\MustahikLainnya;
use App\Models\AturanZakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    public function pengumpulan()
    {
        $pengumpulanZakat = BayarZakat::orderBy('created_at', 'desc')->get();
        
        $totalMuzakki = BayarZakat::distinct('nama_kk')->count('nama_kk');
        
        $totalJiwa = BayarZakat::sum('jumlah_tanggungan_bayar');
        
        $totalBeras = BayarZakat::where('jenis_bayar', 'beras')
            ->sum(DB::raw('CAST(bayar_beras AS DECIMAL(10,2))'));
        $totalUang = BayarZakat::where('jenis_bayar', 'uang')
            ->sum(DB::raw('CAST(bayar_uang AS DECIMAL(15,2))'));

        $totalDistribusiBeras = DB::table('mustahik_wargas')->sum('hak') + 
                               DB::table('mustahik_lainnyas')->sum('total_beras');

        $sisaBeras = $totalBeras - $totalDistribusiBeras;
        
        $hargaBerasRataRata = DB::table('aturan_zakat')->avg('harga_beras_per_kg');

        $berasFromUang = $totalUang / $hargaBerasRataRata;
        
        $totalKeseluruhanBeras = $totalBeras + $berasFromUang;
        
        return view('laporan.pengumpulan', compact(
            'pengumpulanZakat',
            'totalMuzakki',
            'totalJiwa',
            'totalBeras',
            'totalUang',
            'totalDistribusiBeras',
            'sisaBeras',
            'berasFromUang',
            'totalKeseluruhanBeras',
            'hargaBerasRataRata'
        ));
    }

    public function distribusi()
    {
        $rekapWarga = DB::table('mustahik_wargas as mw')
            ->join('aturan_zakat as az', 'mw.id_aturan_zakat', '=', 'az.id')
            ->select(
                'mw.kategori',
                'az.nama_daerah as daerah',
                'az.standar_beras_per_jiwa as hak',
                DB::raw('COUNT(*) as jumlah_kk'),
                DB::raw('SUM(mw.hak) as total_beras')
            )
            ->groupBy('mw.kategori', 'az.nama_daerah', 'az.standar_beras_per_jiwa')
            ->get();

        $rekapWarga = $rekapWarga->map(function($row) {
            return [
                'kategori' => ucfirst($row->kategori),
                'daerah' => $row->daerah,
                'hak' => $row->hak,
                'jumlah_kk' => $row->jumlah_kk,
                'total_beras' => $row->total_beras
            ];
        });

        $rekapLainnya = DB::table('mustahik_lainnyas as ml')
            ->join('aturan_zakat as az', 'ml.id_aturan_zakat', '=', 'az.id')
            ->select(
                'ml.kategori',
                'az.nama_daerah as daerah',
                'az.standar_beras_per_jiwa as hak',
                DB::raw('COUNT(*) as jumlah_kk'),
                DB::raw('SUM(ml.total_beras) as total_beras')
            )
            ->groupBy('ml.kategori', 'az.nama_daerah', 'az.standar_beras_per_jiwa')
            ->get();

        $rekapLainnya = $rekapLainnya->map(function($row) {
            return [
                'kategori' => ucfirst($row->kategori),
                'daerah' => $row->daerah,
                'hak' => $row->hak,
                'jumlah_kk' => $row->jumlah_kk,
                'total_beras' => $row->total_beras
            ];
        });

        $totalDistribusiBeras = DB::table('mustahik_wargas')->sum('hak') + 
                               DB::table('mustahik_lainnyas')->sum('total_beras');

        return view('laporan.distribusi', compact(
            'rekapWarga',
            'rekapLainnya',
            'totalDistribusiBeras'
        ));
    }
} 