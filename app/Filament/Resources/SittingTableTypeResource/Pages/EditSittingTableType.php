<?php

namespace App\Filament\Resources\SittingTableTypeResource\Pages;

use App\Filament\Resources\SittingTableTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSittingTableType extends EditRecord
{
    protected static string $resource = SittingTableTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
