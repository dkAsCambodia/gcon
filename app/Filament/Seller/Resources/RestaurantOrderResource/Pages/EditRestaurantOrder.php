<?php

namespace App\Filament\Seller\Resources\RestaurantOrderResource\Pages;

use App\Filament\Seller\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurantOrder extends EditRecord
{
    protected static string $resource = RestaurantOrderResource::class;

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
