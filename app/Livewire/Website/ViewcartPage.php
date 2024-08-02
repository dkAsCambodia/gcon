<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Language;
use App\Models\RestaurantFood;
use Session;
use Illuminate\Support\Facades\DB;

class ViewcartPage extends Component
{
    public $cust_id, $cartList;
    public function mount()
    {
        if(Session::get('memberdata')){
            $this->cust_id = Session::get('memberdata')['id'];
        }elseif(Session::get('guest_Cust_id')){
            $this->cust_id = Session::get('guest_Cust_id');
        }
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

                // dd($this->cartList);

    }

    public function render()
    {
        $title =   __('message.My cart');
        return view('livewire.website.viewcart-page')->title($title);
    }
}
