<?php
namespace App\Filament\Seller\Resources\RestaurantFoodResource\Pages;
use App\Filament\Seller\Resources\RestaurantFoodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListRestaurantFood extends ListRecords
{
    protected static string $resource = RestaurantFoodResource::class;
    
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
            'GEntertainment' => Tab::make(__('message.Active'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('food_status', '1')),
            'GBooking' => Tab::make(__('message.Inactive'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('food_status', '0')),
        ];
    }
}
