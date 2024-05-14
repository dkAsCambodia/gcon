<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Language;
use App\Models\TblGbooking;

class BookingNowPage extends Component
{
    public function render()
    {
        $title =    __('message.Booking Now');
        $entertainments=TblGbooking::where(['recognize' => 'GEntertainment', 'status' => '1'])->orderBy('order')->get();
        $bookings=TblGbooking::where(['recognize' => 'GBooking', 'status' => '1'])->orderBy('order')->get();
        $services=TblGbooking::where(['recognize' => 'GService', 'status' => '1'])->orderBy('order')->get();
        // dd($entertainments);
        return view('livewire.website.booking-now-page',compact('entertainments', 'bookings', 'services'))->title($title);
    }
}
