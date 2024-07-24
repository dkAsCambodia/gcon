<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Language;
use App\Models\TblGbooking;
use App\Models\RestaurantCart;
use Session;

use Stevebauman\Location\Facades\Location;
use App\Models\Country;


class Header extends Component
{
    public $IpLocation, $cartCount;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function updateCartCount($count)
    {
        $this->cartCount = $count;
    }

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

        // Code for Total Cart Count START
        if(Session::get('memberdata')){
            $uniqueId = Session::get('memberdata')['id'];
            $existCartCount = RestaurantCart::where(['order_status' => '0', 'food_cart_status' => '1', 'customer_id' => $uniqueId])->sum('f_qty');
                // dd($existCartCount);
                if(!empty($existCartCount)){
                    $this->cartCount = $existCartCount;
                }else{
                    $this->cartCount = '0';
                }
        }elseif(Session::get('guest_Cust_id')){
                $uniqueId = Session::get('guest_Cust_id');
                $existCartCount = RestaurantCart::where(['order_status' => '0', 'food_cart_status' => '1', 'customer_id' => $uniqueId])->sum('f_qty');
                // dd($existCartCount);
                if(!empty($existCartCount)){
                    $this->cartCount = $existCartCount;
                }else{
                    $this->cartCount = '0';
                }
        }else{
            $this->cartCount = '0';
        }
         // Code for Total Cart Count START
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
