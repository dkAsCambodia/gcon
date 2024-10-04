<?php

namespace App\Filament\DeliveryBoy\Resources\RestaurantOrderResource\Pages;

use App\Filament\DeliveryBoy\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRestaurantOrder extends CreateRecord
{
    protected static string $resource = RestaurantOrderResource::class;
}
