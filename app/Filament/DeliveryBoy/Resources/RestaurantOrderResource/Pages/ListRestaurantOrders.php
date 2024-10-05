<?php

namespace App\Filament\DeliveryBoy\Resources\RestaurantOrderResource\Pages;

use App\Filament\DeliveryBoy\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRestaurantOrders extends ListRecords
{
    protected static string $resource = RestaurantOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
