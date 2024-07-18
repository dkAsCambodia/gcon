<?php

namespace App\Filament\Seller\Resources\RestaurantFoodTranslationResource\Pages;

use App\Filament\Seller\Resources\RestaurantFoodTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurantFoodTranslation extends EditRecord
{
    protected static string $resource = RestaurantFoodTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
