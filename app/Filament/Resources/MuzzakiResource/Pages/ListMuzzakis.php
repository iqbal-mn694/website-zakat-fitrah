<?php

namespace App\Filament\Resources\MuzzakiResource\Pages;

use App\Filament\Resources\MuzzakiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMuzzaki extends ListRecords
{
    protected static string $resource = MuzzakiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
