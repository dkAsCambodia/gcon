<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Language;
use App\Models\TblGbooking;
use Session;

use Stevebauman\Location\Facades\Location;
use App\Models\Country;


class Header extends Component
{
    public $IpLocation;

    public function mount($logo = null)
    {
        $SESSLOCAATION= Session::get('sessLocation');
        if(empty($SESSLOCAATION)){
                $ip= request()->ip()=='127.0.0.1' ? '103.146.44.34' : request()->ip();
                $IpLocation = Location::get($ip);
                //  dd($IpLocation->currencyCode);
                $Query = Country::where(['curency_code' => $IpLocation->currencyCode, 'status'=> '1'])->first();
                Session::put('sessLocation', $Query);
        }
    }
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
