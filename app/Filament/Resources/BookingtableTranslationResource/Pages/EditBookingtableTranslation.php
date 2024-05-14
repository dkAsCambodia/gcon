<?php

namespace App\Filament\Resources\BookingtableTranslationResource\Pages;

use App\Filament\Resources\BookingtableTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookingtableTranslation extends EditRecord
{
    protected static string $resource = BookingtableTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
