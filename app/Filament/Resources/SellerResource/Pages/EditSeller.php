<?php

namespace App\Filament\Resources\SellerResource\Pages;

use App\Filament\Resources\SellerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeller extends EditRecord
{
    protected static string $resource = SellerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     $data['password'] = base64_encode($data['password']);
    //     return $data;
    // }

}
