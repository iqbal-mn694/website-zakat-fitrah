<?php

namespace App\Filament\Resources\PengumpulanZakatResource\Pages;

use App\Filament\Resources\PengumpulanZakatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengumpulanZakat extends EditRecord
{
    protected static string $resource = PengumpulanZakatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
} 