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
    public function getBreadcrumb(): string
    {
        return __('message.New');
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


    // protected function getCreatedNotification(): ?Notification
    // {
    //     $record= $this->record;
    //     return Notification::make()
    //         ->success()
    //         ->title( __('message.Concert Tables created'))
    //         ->icon('heroicon-o-ticket')
    //         ->body(__('message.Concert Table has been created successfully!'))
    //         ->actions([
    //             Action::make('View')->button()->url(
    //                 BookingtableResource::getUrl('edit', ['record' => $record])
    //             ),
    //         ])
    //         ->sendToDatabase(auth()->user());       
    // }

    
    protected function getCreatedNotification(): ?Notification
    {
        $record = $this->record;
        $roles = ['seller', 'admin'];
        $users = \App\Models\User::whereIn('role', $roles)->get();

        foreach ($users as $user) {
            Notification::make()
                ->success()
                ->title(__('message.Concert Tables created'))
                ->icon('heroicon-o-ticket')
                ->body(__('message.Concert Table has been created successfully!'))
                ->sendToDatabase($user); 
        }
        return null;  
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
