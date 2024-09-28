<?php

namespace App\Filament\DeliveryBoy\Resources\DeliveryBoyResource\Pages;

use App\Filament\DeliveryBoy\Resources\DeliveryBoyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeliveryBoy extends EditRecord
{
    protected static string $resource = DeliveryBoyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
