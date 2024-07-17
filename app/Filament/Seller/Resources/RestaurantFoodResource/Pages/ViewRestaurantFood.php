<?php

namespace App\Filament\Seller\Resources\RestaurantFoodResource\Pages;

use App\Filament\Seller\Resources\RestaurantFoodResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRestaurantFood extends ViewRecord
{
    protected static string $resource = RestaurantFoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
