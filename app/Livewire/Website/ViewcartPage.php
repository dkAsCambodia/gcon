<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Language;
use App\Models\RestaurantFood;
use App\Models\RestaurantCart;
use Session;
use Illuminate\Support\Facades\DB;

class ViewcartPage extends Component
{
    public $cust_id, $cartList, $totalPrice=0, $cartCount, $subTotal, $charge;
    public function mount()
    {
        // $totalPrice = $foods->sum(function ($food) {
        //     $effectivePrice = $food->price - ($food->price * $food->discount / 100);
        //     return $effectivePrice * $food->cart_qty;
        // });
        // $totalPrice = $foods->sum(function ($food) {
        //     return $food->price * $food->cart_qty;
        // });
        
        // $this->cartList = $foods;
        // $this->totalPrice = $totalPrice;
        // dd($this->cartList);
        $this->getCartList();
        $this->calculateTotalPrice();

    }

    public function increaseQty($cartrowId)
    {
        $cartData=RestaurantCart::where('id', $cartrowId)->first();
        if(!empty($cartData)){
            $new_qty = $cartData->f_qty + 1;
            RestaurantCart::where('id', $cartrowId)->update(['f_qty' => $new_qty]);
            $this->getCartList();
            $this->calculateTotalPrice();
        }else{
            dd('data not found!');
        }
        
    }

    public function decreaseQty($cartrowId)
    {
        $cartData=RestaurantCart::where('id', $cartrowId)->first();
        if(!empty($cartData) && $cartData->f_qty > 1){
            $new_qty = $cartData->f_qty - 1;
            RestaurantCart::where('id', $cartrowId)->update(['f_qty' => $new_qty]);
        }else{
            RestaurantCart::where('id', $cartrowId)->delete();
        }
        $this->getCartList();
        $this->calculateTotalPrice();
    }

    public function deleteFoodformCart($cartrowId)
    {
        RestaurantCart::where('id', $cartrowId)->delete();
        $this->getCartList();
        $this->calculateTotalPrice();
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
        $title =   __('message.My cart');
        return view('livewire.website.viewcart-page')->title($title);
    }
}
