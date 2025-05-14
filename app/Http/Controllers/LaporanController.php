<?php

namespace App\Http\Controllers;

use App\Models\Bayar_Zakat;
use App\Models\Mustahik_Warga;
use App\Models\Mustahik_Lainnya;
use App\Models\AturanZakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    public function pengumpulan()
    {
        // Data pengumpulan zakat
        $pengumpulanZakat = Bayar_Zakat::orderBy('created_at', 'desc')->get();
        
        // Total muzakki = jumlah unik nama_kk
        $totalMuzakki = Bayar_Zakat::distinct('nama_kk')->count('nama_kk');
        
        // Total jiwa = jumlah total tanggungan bayar
        $totalJiwa = Bayar_Zakat::sum('jumlah_tanggungan_bayar');
        
        // Total zakat terkumpul
        $totalBeras = Bayar_Zakat::where('jenis_bayar', 'beras')
            ->sum(DB::raw('CAST(bayar_beras AS DECIMAL(10,2))'));
        $totalUang = Bayar_Zakat::where('jenis_bayar', 'uang')
            ->sum(DB::raw('CAST(bayar_uang AS DECIMAL(15,2))'));

        // Total zakat yang sudah didistribusikan
        $totalDistribusiBeras = DB::table('mustahik__wargas')->sum('hak') + 
                               DB::table('mustahik_lainnyas')->sum('total_beras');

        // Sisa zakat yang belum didistribusikan
        $sisaBeras = $totalBeras - $totalDistribusiBeras;
        
        // Konversi uang ke beras (asumsi harga beras rata-rata)
        $hargaBerasRataRata = DB::table('aturan_zakat')->avg('harga_beras_per_kg');
        $berasFromUang = $totalUang / $hargaBerasRataRata;
        
        // Total keseluruhan dalam bentuk beras
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
        // Rekap warga: group by kategori dan aturan zakat
        $rekapWarga = DB::table('mustahik__wargas as mw')
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

        // Rekap lainnya: group by kategori dan aturan zakat
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

        // Hitung total distribusi beras
        $totalDistribusiBeras = DB::table('mustahik__wargas')->sum('hak') + 
                               DB::table('mustahik_lainnyas')->sum('total_beras');

        return view('laporan.distribusi', compact(
            'rekapWarga',
            'rekapLainnya',
            'totalDistribusiBeras'
        ));
    }
} 