<?php

namespace App\Filament\Resources\AuthorizedByeResource\Pages;

use App\Filament\Resources\AuthorizedByeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuthorizedBye extends EditRecord
{
    protected static string $resource = AuthorizedByeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
