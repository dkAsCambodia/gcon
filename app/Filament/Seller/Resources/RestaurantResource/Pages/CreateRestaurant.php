<?php

namespace App\Filament\Seller\Resources\RestaurantResource\Pages;

use App\Filament\Seller\Resources\RestaurantResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRestaurant extends CreateRecord
{
    protected static string $resource = RestaurantResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
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
