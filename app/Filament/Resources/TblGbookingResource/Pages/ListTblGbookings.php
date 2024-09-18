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
            'all' => Tab::make(__('message.All')),
            'GEntertainment' => Tab::make(__('message.G-Entertainment'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('recognize', 'GEntertainment')),
            'GBooking' => Tab::make(__('message.G-Booking'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('recognize', 'GBooking')),
            'GService' => Tab::make(__('message.G-Service'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('recognize', 'GService')),
        ];
    }
}
