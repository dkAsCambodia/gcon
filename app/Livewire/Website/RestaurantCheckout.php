<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Language;
use App\Models\RestaurantFood;
use App\Models\RestaurantCart;
use App\Models\ShipAddresse;
use Session;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule; 

class RestaurantCheckout extends Component
{

    public $cust_id, $cartList, $totalPrice=0, $cartCount, $subTotal, $charge, $shipAddress, $delivery_suggestion;
    
    #[Rule('required')]
    public $payment_type;

    public function mount()
    {
        $this->getCartList();
        $this->calculateTotalPrice();
        $this->shipAddress = ShipAddresse::where('cust_id', $this->cust_id)->first();
        //  dd($this->shipAddress);
    }

    public function OrderPlaceSave()
    {
        $validated = $this->validate();
        // dd($validated);
        date_default_timezone_set('Asia/Phnom_Penh');
        $created_at=date("Y-m-d h:i:s");
        $data=array(
            // 'card_number'      => $this->card_number,
            'payment_type'      => $this->payment_type,
            'delivery_suggestion'      => $this->delivery_suggestion,
            'created_at' =>  $created_at,
        );
        dd($data);
        // $user = Customer::create($data);

    }
    

    public function getCartList()
    {
        if(Session::get('memberdata')){
            $this->cust_id = Session::get('memberdata')['id'];
        }elseif(Session::get('guest_Cust_id')){
            $this->cust_id = Session::get('guest_Cust_id');
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

    public function render()
    {
        $title =   __('message.Delivery service for your favourite restaurants - GCON');
        return view('livewire.website.restaurant-checkout')->title($title);
    }
}
