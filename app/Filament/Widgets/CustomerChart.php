<?php
namespace App\Filament\Widgets;

use App\Models\Customer;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class CustomerChart extends ChartWidget
{
    protected static ?string $heading;
    public function __construct() {
        static::$heading = __('message.Customer Chart');
    }
    protected static ?string $pollingInterval = '10s';
    protected static ?int $sort = 0;
    public ?string $filter = '';
    protected static ?string $maxHeight = '300px';
    
    public function getDescription(): ?string
    {
       return __('message.The number of Customer Registration Chart per month');
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'animations' => [
                'tension' => [
                    'duration' => 1000,
                    'easing' => 'linear',
                    'from' => 1,
                    'to' => 0,
                    'loop' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }


    protected function getFilters(): ?array
    {
        return [
            now()->startOfYear()->format('Y') => now()->startOfYear()->format('Y'),
            now()->startOfYear()->subYear(1)->format('Y') => now()->startOfYear()->subYear(1)->format('Y'),
            now()->startOfYear()->subYear(2)->format('Y') => now()->startOfYear()->subYear(2)->format('Y'),
            now()->startOfYear()->subYear(3)->format('Y') => now()->startOfYear()->subYear(3)->format('Y'),
            now()->startOfYear()->subYear(4)->format('Y') => now()->startOfYear()->subYear(4)->format('Y'),
            now()->startOfYear()->subYear(5)->format('Y') => now()->startOfYear()->subYear(5)->format('Y'),
        ];
    }

    protected function getData(): array
    {
        if ($this->filter == '') {
            $this->filter = date('Y');
        }
        $activeFilter = $this->filter;

        $startDate = now()->startOfYear();
        $endDate = now()->endOfYear();

        $diff = date('Y') - $activeFilter;

        if ($diff != 0) {
            $startDate = now()->startOfYear()->subYear($diff);
            $endDate = now()->endOfYear()->subYear($diff);
        }

        $data = Trend::query(Customer::where('status', '1'))
            ->between(
                start: $startDate,
                end: $endDate,
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('message.Customer Registration'),
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => date('F', strtotime($value->date))),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
