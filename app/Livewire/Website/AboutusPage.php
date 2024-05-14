<?php
namespace App\Livewire\Website;
use Livewire\Component;


class AboutusPage extends Component
{
    public function render()
    {
        $title =   __('message.AboutUs');
        return view('livewire.website.aboutus-page')->title($title);
    }
}
