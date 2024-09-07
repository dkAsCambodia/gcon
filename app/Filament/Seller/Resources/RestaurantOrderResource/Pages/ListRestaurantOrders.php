<?php

namespace App\Filament\Seller\Resources\RestaurantOrderResource\Pages;

use App\Filament\Seller\Resources\RestaurantOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
class ListRestaurantOrders extends ListRecords
{
    protected static string $resource = RestaurantOrderResource::class;
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
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'success')),
            'Pending' => Tab::make(__('message.Pending'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('payment_status', 'pending')),
            'Ordered' => Tab::make(__('message.Ordered'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('order_status', 'ordered')),
            'assigned' => Tab::make(__('message.Assigned'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'assigned')),
            'accepted' => Tab::make(__('message.Accepted'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'accepted')),
            'shipped' => Tab::make(__('message.Shipped'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'shipped')),
            'rejected' => Tab::make(__('message.Rejected'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'rejected')),
            'delivered' => Tab::make(__('message.Delivered'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'delivered')),
            'cancelled' => Tab::make(__('message.Cancelled'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('assign_status', 'cancelled')),
            
        ];
    }
}
