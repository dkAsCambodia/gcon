<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Restaurant;


class BookingRestaurantTables extends Component
{
   
    public $restaurantList;

    public function mount()
    {
        
        $this->restaurantList=Restaurant::where(['openStatus' => '1', 'status' => '1'])->orderBy('id', 'desc')->get();
        
    }

    public function render()
    {
        $title =    __('message.Booking Restaurants');
        return view('livewire.website.booking-restaurant-tables')->title($title);
    }
}
