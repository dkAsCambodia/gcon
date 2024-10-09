<?php

namespace App\Filament\Resources\CarBannerResource\Pages;

use App\Filament\Resources\CarBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarBanner extends EditRecord
{
    protected static string $resource = CarBannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
