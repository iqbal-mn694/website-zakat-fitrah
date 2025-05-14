<?php

namespace App\Filament\Resources\DistribusiZakatWargaResource\Pages;

use App\Filament\Resources\DistribusiZakatWargaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDistribusiZakatWarga extends ListRecords
{
    protected static string $resource = DistribusiZakatWargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
} 