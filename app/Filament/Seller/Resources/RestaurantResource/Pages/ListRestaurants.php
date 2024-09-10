<?php
namespace App\Filament\Seller\Resources\RestaurantResource\Pages;
use App\Filament\Seller\Resources\RestaurantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListRestaurants extends ListRecords
{
    protected static string $resource = RestaurantResource::class;

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
            'GEntertainment' => Tab::make('Active')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', '1')),
            'GBooking' => Tab::make('InActive')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', '0')),
        ];
    }
}
