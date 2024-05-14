<?php

namespace App\Filament\Resources\TableCategoryTranslationResource\Pages;

use App\Filament\Resources\TableCategoryTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTableCategoryTranslation extends EditRecord
{
    protected static string $resource = TableCategoryTranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
