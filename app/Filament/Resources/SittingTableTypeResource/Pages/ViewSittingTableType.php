<?php

namespace App\Filament\Resources\SittingTableTypeResource\Pages;

use App\Filament\Resources\SittingTableTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSittingTableType extends ViewRecord
{
    protected static string $resource = SittingTableTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
