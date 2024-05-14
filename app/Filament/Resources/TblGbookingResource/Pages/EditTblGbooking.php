<?php

namespace App\Filament\Resources\TblGbookingResource\Pages;

use App\Filament\Resources\TblGbookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTblGbooking extends EditRecord
{
    protected static string $resource = TblGbookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
