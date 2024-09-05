<?php

namespace App\Filament\Resources\RestaurantOrderResource\Pages;

use App\Filament\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRestaurantOrder extends CreateRecord
{
    protected static string $resource = RestaurantOrderResource::class;
}
