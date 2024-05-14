<?php
namespace App\Livewire\Website;
use Livewire\Component;


class PaymentOptionsPage extends Component
{
    public $amount;
    public $currencySymbol;
    public $currency;
    public function render()
    {
        $title =    __('message.Payment Options');
        return view('livewire.website.payment-options-page')->title($title);
    }
}
