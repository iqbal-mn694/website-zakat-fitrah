<?php

namespace App\Filament\Resources\MuzzakiResource\Pages;

use App\Filament\Resources\MuzzakiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMuzzaki extends EditRecord
{
    protected static string $resource = MuzzakiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
