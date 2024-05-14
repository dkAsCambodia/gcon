<?php
namespace App\Filament\Widgets;
use Filament\Widgets\ChartWidget;

class AdminDashboardChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 1;
    protected static ?string $maxHeight = '300px';
    public ?string $filter = '';
    
    public function getDescription(): ?string
    {
       return 'The number of Gcon Service Chart per month.';
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
        return [
            'datasets' => [
                [
                    'label' => 'G-CON posts created',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => 'lightgreen',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

            
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
