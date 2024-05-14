<?php
namespace App\Livewire\Website;
use Livewire\Component;

class DashboardPage extends Component
{
    public function render()
    {
        $title =   __('message.Gcon Member Dashboard');
        return view('livewire.website.dashboard-page')->title($title);
    }
}
