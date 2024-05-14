<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\TblGbooking;

class HomeGservice extends Component
{
    public function render()
    {
        $serviceLists=TblGbooking::where(['status' => '1', 'recognize' => 'GService'])->orderBy('id', 'desc')->get();
        // dd($bookingdata);
        return view('livewire.website.home-gservice',compact('serviceLists'));
    }
}
