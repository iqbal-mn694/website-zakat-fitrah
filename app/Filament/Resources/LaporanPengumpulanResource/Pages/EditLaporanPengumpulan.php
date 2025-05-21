<?php

namespace App\Filament\Resources\LaporanPengumpulanResource\Pages;

use App\Filament\Resources\LaporanPengumpulanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanPengumpulan extends EditRecord
{
    protected static string $resource = LaporanPengumpulanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
