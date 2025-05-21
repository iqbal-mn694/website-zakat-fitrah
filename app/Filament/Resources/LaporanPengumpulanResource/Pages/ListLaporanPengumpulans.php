<?php

namespace App\Filament\Resources\LaporanPengumpulanResource\Pages;

use App\Filament\Resources\LaporanPengumpulanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanPengumpulan extends ListRecords
{
    protected static string $resource = LaporanPengumpulanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
