<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Restaurant;

class RestaurantPage extends Component
{
    public $restaurantList;

    public function mount()
    {
        // $this->categorydata=Restaurant::where(['status' => '1', 'GBooking_id' => '1'])->orderBy('order', 'asc')->get();
        $this->restaurantList=Restaurant::where(['openStatus' => '1', 'status' => '1'])->orderBy('id', 'desc')->get();
        // dd($this->restaurantList);
    }

    public function render()
    {
        $title =    __('message.Restaurants');
        return view('livewire.website.restaurant-page')->title($title);
    }
}
