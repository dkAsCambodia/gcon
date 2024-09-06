<?php

namespace App\Filament\Seller\Resources\RestaurantOrderResource\Pages;

use App\Filament\Seller\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRestaurantOrder extends ViewRecord
{
    protected static string $resource = RestaurantOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
