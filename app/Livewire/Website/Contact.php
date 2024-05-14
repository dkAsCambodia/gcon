<?php
namespace App\Livewire\Website;
use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        $title =   __('message.Contacts');
        return view('livewire.website.contact')->title($title);
    }
}
