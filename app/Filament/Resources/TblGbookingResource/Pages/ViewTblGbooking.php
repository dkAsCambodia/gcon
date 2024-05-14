<?php

namespace App\Filament\Resources\TblGbookingResource\Pages;

use App\Filament\Resources\TblGbookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTblGbooking extends ViewRecord
{
    protected static string $resource = TblGbookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
