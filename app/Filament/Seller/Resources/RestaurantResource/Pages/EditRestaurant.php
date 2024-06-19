<?php

namespace App\Filament\Seller\Resources\RestaurantResource\Pages;

use App\Filament\Seller\Resources\RestaurantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRestaurant extends EditRecord
{
    protected static string $resource = RestaurantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if($data['lat']){
            $locationArray = $data['lat'];
            // Create a new associative array to store the extracted values
            $data['lat'] = $locationArray['lat'];
            $data['long'] = $locationArray['lng'];
        }
        return $data;
    }

}
