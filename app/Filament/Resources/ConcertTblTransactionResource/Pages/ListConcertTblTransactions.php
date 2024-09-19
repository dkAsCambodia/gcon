<?php

namespace App\Filament\Resources\ConcertTblTransactionResource\Pages;
use App\Filament\Resources\ConcertTblTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListConcertTblTransactions extends ListRecords
{
    protected static string $resource = ConcertTblTransactionResource::class;
    public function getBreadcrumb(): string
    {
        return __('message.List');
    }
    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(__('message.All')),
            'Success' => Tab::make(__('message.Success'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'success')),
            'Pending' => Tab::make(__('message.Pending'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending')),
            'Cancellled Booking' => Tab::make(__('message.Cancelled'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('cancelStatus', '1')),
                
        ];
    }
}
