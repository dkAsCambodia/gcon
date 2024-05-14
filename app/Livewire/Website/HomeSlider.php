<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\TblGbooking;
class HomeSlider extends Component
{
    public function render()
    {
        $sliders=TblGbooking::where(['status' => '1'])->orderBy('id', 'desc')->get();
        // dd($sliders);
        return view('livewire.website.home-slider',compact('sliders'));
    }
}
