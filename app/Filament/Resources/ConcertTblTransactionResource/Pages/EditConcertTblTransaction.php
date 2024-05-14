<?php

namespace App\Filament\Resources\ConcertTblTransactionResource\Pages;

use App\Filament\Resources\ConcertTblTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConcertTblTransaction extends EditRecord
{
    protected static string $resource = ConcertTblTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
