<?php

namespace App\Filament\Resources\AuthorizedByeResource\Pages;

use App\Filament\Resources\AuthorizedByeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuthorizedByes extends ListRecords
{
    protected static string $resource = AuthorizedByeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
