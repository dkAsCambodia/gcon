<?php

namespace App\Filament\Resources\ShipAddresseResource\Pages;

use App\Filament\Resources\ShipAddresseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShipAddresses extends ListRecords
{
    protected static string $resource = ShipAddresseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
