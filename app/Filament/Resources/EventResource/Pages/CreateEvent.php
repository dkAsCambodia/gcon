<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     if(empty($data['GBooking_id'])){
    //         $data['GBooking_id'] = '1';
    //         return $data;
    //     }
        
    // }
}