<?php

namespace App\Filament\Resources\GbookingTranslationResource\Pages;

use App\Filament\Resources\GbookingTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGbookingTranslation extends ViewRecord
{
    protected static string $resource = GbookingTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
