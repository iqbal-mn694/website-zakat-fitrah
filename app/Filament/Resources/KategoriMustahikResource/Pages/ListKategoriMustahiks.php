<?php

namespace App\Filament\Resources\KategoriMustahikResource\Pages;

use App\Filament\Resources\KategoriMustahikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriMustahiks extends ListRecords
{
    protected static string $resource = KategoriMustahikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
