<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;

class ConcertCalcelationPolicyPage extends Component
{
    public $botton ='inactive';
    public bool $checked = false;
  
    public function processMark()
    {
        if ($this->checked) {
            $this->botton= '';
        } else {
            $this->botton= 'inactive';
        }
    }

    public function render()
    {
        $title =    __('message.Cancellation Policy');
        return view('livewire.website.dashboard.concert-calcelation-policy-page')->title($title);
    }
}
