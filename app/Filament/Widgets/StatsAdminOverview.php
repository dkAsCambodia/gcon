<?php
namespace App\Filament\Widgets;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Customer;
use App\Models\Bookingtable;
use App\Models\TblGbooking;
use App\Models\Restaurant;
use App\Models\Seller;
use App\Models\DeliveryBoy;
use App\Models\RestaurantCategory;
use App\Models\RestaurantFood;
use Filament\Widgets\ChartWidget;

class StatsAdminOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '5s';
    protected function getStats(): array
    {
        return [
            Stat::make(__('message.Customers'), Customer::query()->count())
                ->description(__('message.All Customers'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make(__('message.GBooking'), TblGbooking::query()->count())
                ->description(__('message.All GBooking'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Stat::make(__('message.Concert Table'), Bookingtable::query()->count())
                ->description(__('message.Concert Booking Table'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            // form seller Infomation code START
            Stat::make(__('message.Seller'), Seller::query()->count())
                ->description(__('message.All Seller'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make(__('message.Restaurants'), Restaurant::query()->count())
                ->description(__('message.All Restaurants'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Stat::make(__('message.Category'), RestaurantCategory::query()->count())
                ->description(__('message.All Categories'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),
            Stat::make(__('message.Foods'), RestaurantFood::query()->count())
                ->description(__('message.All foods'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make(__('message.Delivery Boy'), DeliveryBoy::query()->count())
                ->description(__('message.All DeliveryBoy'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
        ];
    }

    

   
}
