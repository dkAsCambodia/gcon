<?php

namespace App\Filament\Resources\SittingLayoutResource\Pages;

use App\Filament\Resources\SittingLayoutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSittingLayout extends EditRecord
{
    protected static string $resource = SittingLayoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
