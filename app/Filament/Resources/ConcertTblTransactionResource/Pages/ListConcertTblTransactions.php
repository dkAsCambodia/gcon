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

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'Success' => Tab::make('Success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'success')),
            'Pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending')),
            
        ];
    }
}
