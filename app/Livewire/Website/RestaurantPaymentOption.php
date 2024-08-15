<?php
namespace App\Livewire\Website;
use Livewire\Component;
class RestaurantPaymentOption extends Component
{

    public $amount;
    public $currencySymbol;
    public $currency;
    public function render()
    {
        $title =    __('message.Payment Options');
        return view('livewire.website.restaurant-payment-option')->title($title);
    }
  
}
