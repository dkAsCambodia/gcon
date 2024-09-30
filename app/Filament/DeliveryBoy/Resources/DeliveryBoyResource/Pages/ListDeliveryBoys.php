<?php

namespace App\Filament\DeliveryBoy\Resources\DeliveryBoyResource\Pages;

use App\Filament\DeliveryBoy\Resources\DeliveryBoyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeliveryBoys extends ListRecords
{
    protected static string $resource = DeliveryBoyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
