<?php
namespace App\Filament\Seller\Widgets;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\RestaurantFood;
use Filament\Widgets\ChartWidget;
class StatsSellerOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Restaurants', Restaurant::owner()->count())
                ->description('All Restaurants')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Category', RestaurantCategory::owner()->count())
                ->description('All Categories')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Stat::make('Food', RestaurantFood::owner()->count())
                ->description('All foods')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
