<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\BayarZakat;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPengumpulan extends Page
{
    protected static string $view = 'filament.pages.laporan-pengumpulan';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationLabel = 'Laporan Pengumpulan Zakat';
    protected static ?int $navigationSort = 20;

    public function getViewData(): array
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

        $berasFromUang = $hargaBerasRataRata > 0 ? $totalUang / $hargaBerasRataRata : 0;

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

    public function exportPdf()
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
        $berasFromUang = $hargaBerasRataRata > 0 ? $totalUang / $hargaBerasRataRata : 0;

        $totalKeseluruhanBeras = $totalBeras + $berasFromUang;

        $pdf = Pdf::loadView('exports.laporan-pengumpulan', [
            'totalMuzakki' => $totalMuzakki,
            'totalJiwa' => $totalJiwa,
            'totalBeras' => $totalBeras,
            'totalUang' => $totalUang,
            'berasFromUang' => $berasFromUang,
            'totalKeseluruhanBeras' => $totalKeseluruhanBeras,
            'totalDistribusiBeras' => $totalDistribusiBeras,
            'sisaBeras' => $sisaBeras,
            'hargaBerasRataRata' => $hargaBerasRataRata,
            'pengumpulanZakat' => $pengumpulanZakat,
        ]);

        return response()->streamDownload(function () use ($pdf) {
        echo $pdf->stream();
    }, 'laporan-distribusi.pdf');
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('export')
                ->label('Export PDF')
                ->action(fn () => $this->exportPdf())
                ->color('success')
            ];
        }
    }
