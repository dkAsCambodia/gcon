<?php

namespace App\Filament\Resources\SittingTableTypeResource\Pages;

use App\Filament\Resources\SittingTableTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSittingTableTypes extends ListRecords
{
    protected static string $resource = SittingTableTypeResource::class;
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
