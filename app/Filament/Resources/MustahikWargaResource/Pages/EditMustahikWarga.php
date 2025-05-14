<?php

namespace App\Filament\Resources\MustahikWargaResource\Pages;

use App\Filament\Resources\MustahikWargaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMustahikWarga extends EditRecord
{
    protected static string $resource = MustahikWargaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
