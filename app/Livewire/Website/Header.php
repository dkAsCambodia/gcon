<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Language;
use App\Models\TblGbooking;
use App\Models\RestaurantCart;
use App\Models\Restaurant;
use App\Models\RestaurantFood;
use Session;
use Illuminate\Support\Facades\DB;

use Stevebauman\Location\Facades\Location;
use App\Models\Country;


class Header extends Component
{
    public $IpLocation, $cartCount, $cartList, $totalPrice=0, $subTotal, $charge, $search, $foodList, $cat_id, $restaurantList;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function updateCartCount($count)
    {
        $this->cartCount = $count;
        $this->getCartList();
        $this->calculateTotalPrice();
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
        $this->getCartList();
        $this->calculateTotalPrice();
         // Code for Total Cart Count START
        $this->foodList = $this->getFoods($this->cat_id);
        $this->restaurantList = Restaurant::where(['openStatus' => '1', 'status' => '1'])->orderBy('id', 'desc')->get();
        // dd( $this->restaurantList);
    }

    public function getSerachDataFun() 
    {
        return $this->redirect('/GBooking/restaurant/searchFood/'.base64_encode($this->search), navigate: true);
    }

    public function getFoods($cat_id = null)
    {
        return RestaurantFood::with(['translations' => function ($query) {
                            $query->where('language_id', Language::where('code', app()->getLocale())->first()?->id ?? 'en');
                        }])
                        ->leftJoin('restaurant_carts', function($join) {
                            $join->on('restaurant_foods.id', '=', 'restaurant_carts.food_id')
                                ->where('restaurant_carts.order_status', '=', 0)
                                ->where('restaurant_carts.food_cart_status', '=', 1);
                                // ->where('restaurant_carts.customer_id', '=', $this->uniqueId); 
                        })
                        ->select(
                            'restaurant_foods.id',
                            'restaurant_foods.food_name',
                            'restaurant_foods.food_img',
                            'restaurant_foods.price',
                            'restaurant_foods.discount',
                            'restaurant_foods.food_status',
                            'restaurant_foods.restaurant_cat_id',
                            'restaurant_foods.seller_id',
                            'restaurant_foods.currency_id',
                            DB::raw('IFNULL(SUM(restaurant_carts.f_qty), 0) as cart_qty')
                        )
                        ->where('restaurant_foods.food_status', 1)
                        // ->where('restaurant_foods.restaurant_id', base64_decode($this->restaurant_id)) 
                        ->whereNull('restaurant_foods.deleted_at')
                        ->when($cat_id, function ($query, $cat_id) {
                            $query->where('restaurant_foods.restaurant_cat_id', base64_decode($cat_id)); // Decode $cat_id inline
                        })
                        ->groupBy(
                            'restaurant_foods.id',
                            'restaurant_foods.food_name',
                            'restaurant_foods.food_img',
                            'restaurant_foods.price',
                            'restaurant_foods.discount',
                            'restaurant_foods.food_status',
                            'restaurant_foods.restaurant_cat_id',
                            'restaurant_foods.seller_id',
                            'restaurant_foods.currency_id'
                        )
                        ->orderBy('restaurant_foods.id', 'desc')
                        ->get();
    }


    public function getCartList()
    {
        if(Session::get('memberdata')){
            $this->cust_id = Session::get('memberdata')['id'];
        }elseif(Session::get('guest_Cust_id')){
            $this->cust_id = Session::get('guest_Cust_id');
        }else{
            $this->cust_id='0';
        }
        // for cartCount in header
        $TotalCartCount = RestaurantCart::where(['order_status' => '0', 'food_cart_status' => '1', 'customer_id' => $this->cust_id])->sum('f_qty');
        $this->cartCount = $TotalCartCount;
        $this->dispatch('cartUpdated', $this->cartCount);
        // for cartCount in header

        $customerId = $this->cust_id;
        $this->cartList = RestaurantFood::with(['translations' => function ($query) {
                    $query->where('language_id', Language::where('code', app()->getLocale())->first()?->id ?? 'en');
                }])
                ->crossJoin('restaurant_carts', function($join) use ($customerId) {
                    $join->on('restaurant_foods.id', '=', 'restaurant_carts.food_id')
                        ->where('restaurant_carts.order_status', '=', 0)
                        ->where('restaurant_carts.food_cart_status', '=', 1)
                        ->where('restaurant_carts.customer_id', '=', $customerId);
                })
                ->select(
                    'restaurant_foods.id',
                    'restaurant_foods.food_name',
                    'restaurant_foods.food_img',
                    'restaurant_foods.price',
                    'restaurant_foods.discount',
                    'restaurant_foods.food_status',
                    'restaurant_foods.restaurant_cat_id',
                    'restaurant_foods.seller_id',
                    'restaurant_foods.currency_id',
                    'restaurant_carts.id as cart_id',
                    DB::raw('IFNULL(SUM(restaurant_carts.f_qty), 0) as cart_qty')
                )
                ->where('restaurant_foods.food_status', 1)
                ->whereNull('restaurant_foods.deleted_at')
                ->groupBy(
                    'restaurant_foods.id',
                    'restaurant_foods.food_name',
                    'restaurant_foods.food_img',
                    'restaurant_foods.price',
                    'restaurant_foods.discount',
                    'restaurant_foods.food_status',
                    'restaurant_foods.restaurant_cat_id',
                    'restaurant_foods.seller_id',
                    'restaurant_foods.currency_id',
                    'restaurant_carts.id'
                )
                ->orderBy('restaurant_foods.id', 'desc')
                ->get();
    }

    public function calculateTotalPrice()
    {
        $this->subTotal = $this->cartList->sum(function ($item) {
            return $item['price'] * $item['cart_qty'];
        });

        if($this->subTotal == $this->charge){
            $this->charge = 2;
            $this->totalPrice = $this->subTotal;
        }else{
            $this->charge = 5;
            $this->totalPrice = $this->subTotal + $this->charge;
        }
       
    }

    public function customerlogout()
    {
        // Session::flush();
        Session::forget('memberdata');
        Session::forget('guest_Cust_id');
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
