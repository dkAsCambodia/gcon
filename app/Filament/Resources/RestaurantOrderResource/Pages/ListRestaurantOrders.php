<?php

namespace App\Filament\Resources\RestaurantOrderResource\Pages;

use App\Filament\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListRestaurantOrders extends ListRecords
{
    protected static string $resource = RestaurantOrderResource::class;

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
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'success')),
            'Pending' => Tab::make('Pending')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'pending')),
            'Ordered' => Tab::make('Ordered')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', 'ordered')),
            'assigned' => Tab::make('assigned')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'assigned')),
            'accepted' => Tab::make('accepted')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'accepted')),
            'shipped' => Tab::make('shipped')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'shipped')),
            'rejected' => Tab::make('rejected')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'rejected')),
            'delivered' => Tab::make('delivered')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'delivered')),
            'cancelled' => Tab::make('cancelled')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'cancelled')),
            
        ];
    }
}
