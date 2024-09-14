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
            Stat::make(__('message.Restaurants'), Restaurant::owner()->count())
                ->description(__('message.All Restaurants'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make(__('message.Category'), RestaurantCategory::owner()->count())
                ->description(__('message.All Categories'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Stat::make(__('message.Foods'), RestaurantFood::owner()->count())
                ->description(__('message.All foods'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
