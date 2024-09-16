<?php

namespace App\Filament\Resources\TableCategoryResource\Pages;

use App\Filament\Resources\TableCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTableCategories extends ListRecords
{
    protected static string $resource = TableCategoryResource::class;
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
