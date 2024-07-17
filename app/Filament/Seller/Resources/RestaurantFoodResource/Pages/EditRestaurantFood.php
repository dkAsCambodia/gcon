<?php

namespace App\Filament\Seller\Resources\RestaurantFoodResource\Pages;

use App\Filament\Seller\Resources\RestaurantFoodResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurantFood extends EditRecord
{
    protected static string $resource = RestaurantFoodResource::class;

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
