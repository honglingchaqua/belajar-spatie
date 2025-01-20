<?php

namespace App\Filament\Resources\DivisiResource\Pages;

use App\Filament\Resources\DivisiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDivisi extends EditRecord
{
    protected static string $resource = DivisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
