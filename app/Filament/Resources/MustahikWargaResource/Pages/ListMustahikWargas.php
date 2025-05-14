<?php

namespace App\Filament\Resources\MustahikWargaResource\Pages;

use App\Filament\Resources\MustahikWargaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMustahikWargas extends ListRecords
{
    protected static string $resource = MustahikWargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
