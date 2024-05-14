<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Language;
use App\Models\TblGbooking;
use Session;

class Header extends Component
{
    public function customerlogout()
    {
        // Session::flush();
        Session::forget('memberdata');
        $msg =  __('message.Logout Successfully!');
        $this->dispatch('toast', message: $msg, notify:'success' ); 
        // return redirect('/');
        return $this->redirect('/', navigate: true);
    }
    
    public function render()
    {
        $languages=Language::where('status', '1')->orderBy('order', 'asc')->get();
        $entertainments=TblGbooking::where(['recognize' => 'GEntertainment', 'status' => '1'])->orderBy('order')->get();
        $bookings=TblGbooking::where(['recognize' => 'GBooking', 'status' => '1'])->orderBy('order')->get();
        $services=TblGbooking::where(['recognize' => 'GService', 'status' => '1'])->orderBy('order')->get();

        // dd($entertainments);
        return view('livewire.website.header',compact('languages', 'entertainments', 'bookings', 'services'));
    }

    
}
