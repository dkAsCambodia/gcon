<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\TblGbooking;
class HomeGentertainment extends Component
{
    public function render()
    {
        $entertainmentLists=TblGbooking::where(['status' => '1', 'recognize' => 'GEntertainment'])->orderBy('id', 'asc')->get();
        // dd($bookingdata);
        return view('livewire.website.home-gentertainment',compact('entertainmentLists'));
    }
}
