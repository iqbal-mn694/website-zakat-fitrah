<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanDistribusi extends Page
{
    protected static string $view = 'filament.pages.laporan-distribusi';

    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationLabel = 'Laporan Distribusi Zakat';
    protected static ?int $navigationSort = 4;


    public array $rekapWarga = [];
    public array $rekapLainnya = [];
    public float $totalDistribusiBeras = 0;

    public function mount(): void
    {
        $this->loadData();
    }

    protected function loadData(): void
    {
        $this->rekapWarga = DB::table('mustahik_wargas as mw')
            ->join('aturan_zakat as az', 'mw.id_aturan_zakat', '=', 'az.id')
            ->select(
                'mw.kategori',
                'az.nama_daerah as daerah',
                'az.standar_beras_per_jiwa as hak',
                DB::raw('COUNT(*) as jumlah_kk'),
                DB::raw('SUM(mw.hak) as total_beras')
            )
            ->groupBy('mw.kategori', 'az.nama_daerah', 'az.standar_beras_per_jiwa')
            ->get()
            ->toArray();

        $this->rekapLainnya = DB::table('mustahik_lainnyas as ml')
            ->join('aturan_zakat as az', 'ml.id_aturan_zakat', '=', 'az.id')
            ->select(
                'ml.kategori',
                'az.nama_daerah as daerah',
                'az.standar_beras_per_jiwa as hak',
                DB::raw('COUNT(*) as jumlah_kk'),
                DB::raw('SUM(ml.total_beras) as total_beras')
            )
            ->groupBy('ml.kategori', 'az.nama_daerah', 'az.standar_beras_per_jiwa')
            ->get()
            ->toArray();

        $this->totalDistribusiBeras = DB::table('mustahik_wargas')->sum('hak') +
                                    DB::table('mustahik_lainnyas')->sum('total_beras');
    }

    public function exportPdf()
    {   
        $this->loadData();
        
        // 
        $pdf = Pdf::loadView('exports.laporan-distribusi', [
            'rekapWarga' => $this->rekapWarga,
            'rekapLainnya' => $this->rekapLainnya,
            'totalDistribusiBeras' => $this->totalDistribusiBeras,
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
