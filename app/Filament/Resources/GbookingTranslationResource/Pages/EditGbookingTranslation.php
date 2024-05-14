<?php

namespace App\Filament\Resources\GbookingTranslationResource\Pages;

use App\Filament\Resources\GbookingTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGbookingTranslation extends EditRecord
{
    protected static string $resource = GbookingTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
