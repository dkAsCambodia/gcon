<?php

namespace App\Filament\Resources\BookingtableResource\Pages;

use App\Filament\Resources\BookingtableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookingtable extends EditRecord
{
    protected static string $resource = BookingtableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     if($data['currency'] == 'USD'){
    //         $cu = '$';
    //     }else{
    //         $cu = '฿';
    //     }
    //     $data['currency_symbol'] =$cu;

    //     return $data;
    // }
}
