<?php

namespace App\Filament\DeliveryBoy\Resources\RestaurantOrderResource\Pages;

use App\Filament\DeliveryBoy\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurantOrder extends EditRecord
{
    protected static string $resource = RestaurantOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
        ];
    }
}
