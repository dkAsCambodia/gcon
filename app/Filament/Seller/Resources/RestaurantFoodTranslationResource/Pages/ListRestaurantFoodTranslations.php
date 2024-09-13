<?php

namespace App\Filament\Seller\Resources\RestaurantFoodTranslationResource\Pages;
use App\Filament\Seller\Resources\RestaurantFoodTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListRestaurantFoodTranslations extends ListRecords
{
    protected static string $resource = RestaurantFoodTranslationResource::class;

    public function getBreadcrumb(): string
    {
        return __('message.List');
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label(__('message.Add New Food Translation')),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(__('message.All language')),
            'English' => Tab::make(__('message.English'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('language_id', 1)),
            'Thai' => Tab::make(__('message.Thai'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('language_id', 2)),
            'Khmer' => Tab::make(__('message.Khmer'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('language_id', 3)),
        ];
    }
}
