<?php

namespace App\Filament\Seller\Resources\RestaurantFoodResource\Pages;

use App\Filament\Seller\Resources\RestaurantFoodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRestaurantFood extends ListRecords
{
    protected static string $resource = RestaurantFoodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
