<?php

namespace App\Filament\Seller\Resources\RestaurantCategoryResource\Pages;

use App\Filament\Seller\Resources\RestaurantCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurantCategory extends EditRecord
{
    protected static string $resource = RestaurantCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
