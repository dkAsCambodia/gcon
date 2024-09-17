<?php
namespace App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;
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
            'active' => Tab::make(__('message.Active'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 1)),
            'inactive' => Tab::make(__('message.Inactive'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 0)),
        ];
    }
}
