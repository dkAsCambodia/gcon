<?php

namespace App\Filament\Seller\Resources\RestaurantTranslationResource\Pages;

use App\Filament\Seller\Resources\RestaurantTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRestaurantTranslations extends ListRecords
{
    protected static string $resource = RestaurantTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
