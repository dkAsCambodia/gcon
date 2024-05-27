<?php

namespace App\Filament\Resources\RestaurantTranslationResource\Pages;

use App\Filament\Resources\RestaurantTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurantTranslation extends EditRecord
{
    protected static string $resource = RestaurantTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
