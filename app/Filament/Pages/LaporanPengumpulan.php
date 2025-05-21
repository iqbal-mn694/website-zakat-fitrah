<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\BayarZakat;
use Illuminate\Support\Facades\DB;

class LaporanPengumpulan extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';
    protected static string $view = 'filament.pages.laporan-pengumpulan';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationLabel = 'Laporan Pengumpulan Zakat';

    public function getViewData(): array
    {
        // Data pengumpulan zakat
        $pengumpulanZakat = BayarZakat::orderBy('created_at', 'desc')->get();
        
        // Total muzakki = jumlah unik nama_kk
        $totalMuzakki = BayarZakat::distinct('nama_kk')->count('nama_kk');
        
        // Total jiwa
        $totalJiwa = BayarZakat::sum('jumlah_tanggungan_bayar');
        
        // Total zakat terkumpul
        $totalBeras = BayarZakat::where('jenis_bayar', 'beras')
            ->sum(DB::raw('CAST(bayar_beras AS DECIMAL(10,2))'));
        $totalUang = BayarZakat::where('jenis_bayar', 'uang')
            ->sum(DB::raw('CAST(bayar_uang AS DECIMAL(15,2))'));

        // Total zakat yang sudah didistribusikan
        $totalDistribusiBeras = DB::table('mustahik__wargas')->sum('hak') + 
                               DB::table('mustahik_lainnyas')->sum('total_beras');

        // Sisa zakat
        $sisaBeras = $totalBeras - $totalDistribusiBeras;

        // Harga beras
        $hargaBerasRataRata = DB::table('aturan_zakat')->avg('harga_beras_per_kg');
        $berasFromUang = $hargaBerasRataRata > 0 ? $totalUang / $hargaBerasRataRata : 0;

        // Total keseluruhan (dalam bentuk beras)
        $totalKeseluruhanBeras = $totalBeras + $berasFromUang;

        return compact(
            'pengumpulanZakat',
            'totalMuzakki',
            'totalJiwa',
            'totalBeras',
            'totalUang',
            'totalDistribusiBeras',
            'sisaBeras',
            'hargaBerasRataRata',
            'berasFromUang',
            'totalKeseluruhanBeras'
        );
    }
}
