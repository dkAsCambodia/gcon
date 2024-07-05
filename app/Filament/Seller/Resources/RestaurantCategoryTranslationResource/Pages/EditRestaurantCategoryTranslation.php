<?php

namespace App\Filament\Seller\Resources\RestaurantCategoryTranslationResource\Pages;

use App\Filament\Seller\Resources\RestaurantCategoryTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurantCategoryTranslation extends EditRecord
{
    protected static string $resource = RestaurantCategoryTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
