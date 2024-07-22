<?php
namespace App\Livewire\Website;
use Livewire\Component;

class ShopModel extends Component
{
    public function render()
    {
        return view('livewire.website.shop-model');
    }

    public $showPopup = false;

    public function openPopup()
    {
        $this->showPopup = true;
    }

    public function closePopup()
    {
        $this->showPopup = false;
    }

    
}
