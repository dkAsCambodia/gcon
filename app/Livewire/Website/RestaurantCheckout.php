<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Language;
use App\Models\RestaurantFood;
use App\Models\RestaurantCart;
use App\Models\ShipAddresse;
use App\Models\RestaurantOrder;
use Session;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule; 
use Carbon\Carbon;


class RestaurantCheckout extends Component
{

    public $cust_id, $cartList, $totalPrice=0, $cartCount, $subTotal, $charge, $shipAddress, $delivery_suggestion;
    public $order_key;
    
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
        if(empty($this->shipAddress)){
            return $this->redirect('/dashboard/shippingAddress', navigate: true);
        }
        date_default_timezone_set('Asia/Phnom_Penh');
        $created_at=date("Y-m-d h:i:s");
        $this->order_key= $this->GenerateOrderKey();
            $TotalcardData = RestaurantCart::join('restaurant_foods', 'restaurant_carts.food_id', '=', 'restaurant_foods.id')
                    ->join('currencies', 'restaurant_foods.currency_id', '=', 'currencies.id')
                    ->where([
                        'restaurant_carts.order_status' => '0',
                        'restaurant_carts.food_cart_status' => '1',
                        'restaurant_carts.customer_id' => $this->cust_id
                    ])
                    ->select(
                        'restaurant_carts.id as cart_id',
                        'restaurant_foods.id as food_id',
                        'restaurant_foods.restaurant_id',
                        'restaurant_foods.price',
                        'restaurant_foods.currency_id',
                        'restaurant_carts.f_qty',
                        'currencies.currency_code',
                        'currencies.currency_symbol',
                    )
                    ->groupBy(
                        'restaurant_carts.id',
                        'restaurant_foods.id',
                        'restaurant_foods.restaurant_id',
                        'restaurant_foods.price',
                        'restaurant_foods.currency_id',
                        'restaurant_carts.f_qty',
                        'currencies.currency_code',
                        'currencies.currency_symbol',
                    )
                    ->get();
                // dd($TotalcardData);
            foreach ($TotalcardData as $cartData) {
                // Create a new instance of the RestaurantOrder model
                $order = new RestaurantOrder();
                $order->restaurant_id = $cartData->restaurant_id;
                $order->food_id = $cartData->food_id;
                $order->cart_id  = $cartData->cart_id;
                $order->cust_id = $this->cust_id;
                $order->address_id = $this->shipAddress->id;
                $order->order_key = $this->order_key;
                $order->quantity  = $cartData->f_qty;
                $order->subTotal  = $this->subTotal;
                $order->charge  = $this->charge;
                $order->totalPayAmount  = $this->totalPrice;
                $order->currency  = $cartData->currency_code;
                $order->currency_symbol  = $cartData->currency_symbol;
                $order->payment_type  = $this->payment_type;
                $order->order_date  = $created_at;
                $order->delivery_suggestion  = $this->delivery_suggestion;
                
                $order->save();
            }

            $orderdata = RestaurantOrder::where('order_key', $this->order_key)->first();
          
            if($this->payment_type=='online'){
                Session::put('restaurant_orderKey', $this->order_key);
                return $this->redirect('/GBooking/restaurant/logAuth/paymentOptions'.'/'.base64_encode($this->totalPrice).'/'.$orderdata->currency_symbol.'/'.base64_encode($orderdata->currency), navigate: true);
            }else{
                $msg =  __('message.Ordered Successfully!');
                $this->dispatch('toast', message: $msg, notify:'success' ); 
                return $this->redirect('restaurantFood/logAuth/invoice'.'/'.base64_encode($this->totalPrice).'/'.$orderdata->currency_symbol.'/'.base64_encode($orderdata->currency).'/'.base64_encode($this->order_key), navigate: true);
            }
            


    }

    public function GenerateOrderKey()
    {
        $prefix = 'GCON';
        $datetime = Carbon::now()->format('dmyHis');
        $order_key = $prefix . $datetime;
        return $order_key;
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
