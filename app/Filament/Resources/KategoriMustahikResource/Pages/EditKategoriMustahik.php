<?php

namespace App\Filament\Resources\KategoriMustahikResource\Pages;

use App\Filament\Resources\KategoriMustahikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriMustahik extends EditRecord
{
    protected static string $resource = KategoriMustahikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
