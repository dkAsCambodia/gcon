<?php

namespace App\Filament\Resources\ShipAddresseResource\Pages;

use App\Filament\Resources\ShipAddresseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShipAddresse extends EditRecord
{
    protected static string $resource = ShipAddresseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
