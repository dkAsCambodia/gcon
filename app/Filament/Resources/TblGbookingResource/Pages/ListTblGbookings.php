<?php

namespace App\Filament\Resources\TblGbookingResource\Pages;

use App\Filament\Resources\TblGbookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTblGbookings extends ListRecords
{
    protected static string $resource = TblGbookingResource::class;
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

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'GEntertainment' => Tab::make('GEntertainment')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('recognize', 'GEntertainment')),
            'GBooking' => Tab::make('GBooking')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('recognize', 'GBooking')),
            'GService' => Tab::make('GService')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('recognize', 'GService')),
        ];
    }
}
