<?php

namespace App\Filament\Seller\Resources\RestaurantTranslationResource\Pages;

use App\Filament\Seller\Resources\RestaurantTranslationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListRestaurantTranslations extends ListRecords
{
    protected static string $resource = RestaurantTranslationResource::class;

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
            'all' => Tab::make('All language'),
            'English' => Tab::make('English')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('language_id', 1)),
            'Thai' => Tab::make('Thai')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('language_id', 2)),
            'Khmer' => Tab::make('Khmer')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('language_id', 3)),
        ];
    }
}
