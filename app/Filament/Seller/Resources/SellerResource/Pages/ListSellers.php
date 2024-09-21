<?php

namespace App\Filament\Seller\Resources\SellerResource\Pages;

use App\Filament\Seller\Resources\SellerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSellers extends ListRecords
{
    protected static string $resource = SellerResource::class;
    public function getBreadcrumb(): string
    {
        return __('message.Seller');
    }
    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
