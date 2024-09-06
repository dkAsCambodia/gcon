<?php

namespace App\Filament\Seller\Resources\RestaurantOrderResource\Pages;

use App\Filament\Seller\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRestaurantOrder extends CreateRecord
{
    protected static string $resource = RestaurantOrderResource::class;
}
