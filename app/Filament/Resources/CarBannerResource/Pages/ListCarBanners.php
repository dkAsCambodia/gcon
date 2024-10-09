<?php

namespace App\Filament\Resources\CarBannerResource\Pages;

use App\Filament\Resources\CarBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarBanners extends ListRecords
{
    protected static string $resource = CarBannerResource::class;
    public function getBreadcrumb(): string
    {
        return __('message.List');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
