<?php
namespace App\Livewire\Website;
use Livewire\Component;

class RestaurantSellerFormPage extends Component
{
    public function render()
    {
        $title =    __('message.Parnter with Gcon');
        return view('livewire.website.restaurant-seller-form-page')->title($title);
    }
}
