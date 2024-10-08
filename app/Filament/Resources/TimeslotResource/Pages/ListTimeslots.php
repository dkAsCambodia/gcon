<?php

namespace App\Filament\Resources\TimeslotResource\Pages;

use App\Filament\Resources\TimeslotResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimeslots extends ListRecords
{
    protected static string $resource = TimeslotResource::class;
    public function getBreadcrumb(): string
    {
        return __('message.List');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
