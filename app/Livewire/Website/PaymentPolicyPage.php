<?php
namespace App\Livewire\Website;
use Livewire\Component;

class PaymentPolicyPage extends Component
{
    public function render()
    {
        $title =    __('message.Privacy Policy');
        return view('livewire.website.payment-policy-page')->title($title);
    }
}
