<?php

namespace App\Filament\Resources\DistribusiZakatWargaResource\Pages;

use App\Filament\Resources\DistribusiZakatWargaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDistribusiZakatWarga extends EditRecord
{
    protected static string $resource = DistribusiZakatWargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
} 