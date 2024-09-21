<?php

namespace App\Filament\Seller\Resources\SellerResource\Pages;

use App\Filament\Seller\Resources\SellerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSeller extends ViewRecord
{
    protected static string $resource = SellerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
