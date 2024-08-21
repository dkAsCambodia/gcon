<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Language;
use App\Models\RestaurantFood;
use App\Models\RestaurantCart;
use App\Models\ShipAddresse;
use App\Models\RestaurantOrder;
use App\Models\Restaurant;
use Session;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule; 

class RestaurantFoodInvoicePage extends Component
{
    public $amount, $currencySymbol, $currency, $orderKey;
    public $transactiondata, $shipAddress, $OrderedcartList, $restaurantDetails, $currentURL;
    #[Rule('required')]
    public $cancel_reason;

    public function mount()
    {
        $this->currentURL = url()->current();   
        $this->transactiondata = RestaurantOrder::where('order_key', base64_decode($this->orderKey))->first();
        if(!empty($this->transactiondata)){

            $this->restaurantDetails = Restaurant::where(['id' => $this->transactiondata->restaurant_id,'openStatus' => '1', 'status' => '1'])->first();
            $this->shipAddress = ShipAddresse::where(['id' => $this->transactiondata->address_id,'ship_status' => '1'])->first();
            $this->getCartOrderedList();
            // dd($this->OrderedcartList);
        }else{
            return $this->redirect('/login', navigate: true);
        }
    }

    public function getCartOrderedList()
    {
        $cust_id = $this->transactiondata->cust_id;
        $orderkey = base64_decode($this->orderKey);
        $this->OrderedcartList = RestaurantFood::with(['translations' => function ($query) {
            $query->where('language_id', Language::where('code', app()->getLocale())->first()?->id ?? 'en');
        }])
        ->select(
            'restaurant_orders.order_key',
            'restaurant_orders.food_id as id',
            'restaurant_orders.quantity',
            'restaurant_orders.currency',
            'restaurant_orders.currency_symbol',
            'restaurant_foods.food_name',
            'restaurant_foods.food_img',
            'restaurant_foods.price',
        )
        ->crossJoin('restaurant_orders', function ($join) use ($orderkey, $cust_id) {
            $join->on('restaurant_foods.id', '=', 'restaurant_orders.food_id')
                 ->where('restaurant_orders.order_key', '=', $orderkey)
                 ->where('restaurant_orders.cust_id', '=', $cust_id);
        })
        ->get();
    }

    // public function loadFoodDetails()
    // {
    //     // dd('dddd');
    //     $this->modalPopup = '';
    //     $this->modalPopup = 'show';
       
    // }

    public function cancelOrderfun(){
      
        $validated = $this->validate();
         RestaurantOrder::where('order_key', base64_decode($this->orderKey))
                    ->update(['cancel_reason' => $this->cancel_reason, 'order_status' => 'Cancelled',]);
        // $this->getCartOrderedList();
        // $this->modalPopup = '';
        $msg =  __('message.Your Order has been Cancelled Successfully!');
        $this->dispatch('toast', message: $msg, notify:'success' );
        return $this->redirect($this->currentURL, navigate: true);
    }


    public function render()
    {
        $title =    __('message.Gcon Restaurant Foods Invoice');
        return view('livewire.website.restaurant-food-invoice-page')->title($title);
    }
}
