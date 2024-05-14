<?php

namespace App\Filament\Resources\BookingtableResource\Pages;

use App\Filament\Resources\BookingtableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Notifications\Events\DatabaseNotificationsSent;

use Filament\Notifications\Notification;
use Filament\Pages\Actions\CreateAction;

class ListBookingtables extends ListRecords
{
    protected static string $resource = BookingtableResource::class;

    

    protected function getHeaderActions(): array
    {
        $recipient = auth()->user();
        
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    if($data['currency'] == 'USD'){
                        $cu = '$';
                    }else{
                        $cu = '฿';
                    }
                    $data['currency_symbol'] =$cu;
                    return $data;
                })
                // // ->successNotificationTitle('Concert Tables created')
                // ->successNotification(
                //     Notification::make()
                //          ->success()
                //          ->title('Concert Tables created')
                //          ->body('Concert Tables has been created successfully!')
                //         //  ->sendToDatabase($recipient),
                //  )
        ];
        
    }

    
}
