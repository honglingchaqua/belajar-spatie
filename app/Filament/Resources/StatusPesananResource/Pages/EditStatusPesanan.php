<?php

namespace App\Filament\Resources\StatusPesananResource\Pages;

use App\Filament\Resources\StatusPesananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusPesanan extends EditRecord
{
    protected static string $resource = StatusPesananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
