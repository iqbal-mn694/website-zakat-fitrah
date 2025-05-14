<?php

namespace App\Filament\Resources\MustahikLainnyaResource\Pages;

use App\Filament\Resources\MustahikLainnyaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMustahikLainnya extends EditRecord
{
    protected static string $resource = MustahikLainnyaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
