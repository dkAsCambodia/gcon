<?php
namespace App\Filament\Widgets;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Customer;
use App\Models\Bookingtable;
use App\Models\TblGbooking;
use Filament\Widgets\ChartWidget;

class StatsAdminOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '5s';
    protected function getStats(): array
    {
        return [
            Stat::make('Customers', Customer::query()->count())
                ->description('All Customers')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('GBooking', TblGbooking::query()->count())
                ->description('All GBooking')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Stat::make('Concert Table', Bookingtable::query()->count())
                ->description('Concert Booking Table')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }

    

   
}
