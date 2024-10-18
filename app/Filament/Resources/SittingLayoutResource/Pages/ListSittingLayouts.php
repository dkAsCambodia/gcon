<?php

namespace App\Filament\Resources\SittingLayoutResource\Pages;

use App\Filament\Resources\SittingLayoutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListSittingLayouts extends ListRecords
{
    protected static string $resource = SittingLayoutResource::class;
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
            'V' => Tab::make('Table-V')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('sitting_table_type_id', 1)),
            'A' => Tab::make('Table-A')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('sitting_table_type_id', 2)),
            'B' => Tab::make('Table-B')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('sitting_table_type_id', 3)),
            'C' => Tab::make('Table-C')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('sitting_table_type_id', 4)),
            'H' => Tab::make('Table-H')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('sitting_table_type_id', 5)),
            'VVIP' => Tab::make('Table-VVIP')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('sitting_table_type_id', 6)),
            'StandingArea' => Tab::make('Standing Area')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('sitting_table_type_id', 7)),
        ];
    }
}
