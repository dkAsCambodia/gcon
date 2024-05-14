<?php

namespace App\Filament\Resources\BookingtableResource\Pages;

use App\Filament\Resources\BookingtableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class CreateBookingtable extends CreateRecord
{
    protected static string $resource = BookingtableResource::class;
    

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


    protected function getCreatedNotification(): ?Notification
    {
        $record= $this->record;
        return Notification::make()
            ->success()
            ->title('Concert Tables created')
            ->icon('heroicon-o-ticket')
            ->body('Concert Tables has been created successfully!')
            ->actions([
                Action::make('View')->button()->url(
                    BookingtableResource::getUrl('edit', ['record' => $record])
                ),
            ])
            ->sendToDatabase(auth()->user());       
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // protected function getCreatedNotificationTitle(): ?string
    // {
    //     return 'Concert Tables created';
    // }
}
