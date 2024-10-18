<?php

namespace App\Filament\Resources\SittingLayoutResource\Pages;

use App\Filament\Resources\SittingLayoutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSittingLayout extends ViewRecord
{
    protected static string $resource = SittingLayoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
