<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\TblGbooking;
class HomeGbooking extends Component
{
    public function render()
    {
        $bookingdata=TblGbooking::where(['status' => '1', 'recognize' => 'GBooking'])->orderBy('id', 'desc')->get();
        // dd($bookingdata);
        return view('livewire.website.home-gbooking',compact('bookingdata'));
    }
}
