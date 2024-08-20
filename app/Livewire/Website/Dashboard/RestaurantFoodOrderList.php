<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;

use App\Models\Language;
use App\Models\RestaurantFood;
use App\Models\RestaurantOrder;
use App\Models\Restaurant;
use Session;

class RestaurantFoodOrderList extends Component
{
    public $sessUser, $OrderedcartList;
    public function mount()
    {
        $this->getCartOrderedList();
    }

    public function getCartOrderedList()
    {

        if (!empty(Session::get('memberdata'))) {
                $this->sessUser = Session::get('memberdata');
           
                $cust_id = $this->sessUser['id'];
                $this->OrderedcartList = RestaurantFood::with(['translations' => function ($query) {
                    $query->where('language_id', Language::where('code', app()->getLocale())->first()?->id ?? 'en');
                }])
                    ->select(
                        'restaurant_orders.order_key',
                        'restaurant_orders.food_id as id',
                        'restaurant_orders.quantity',
                        'restaurant_orders.currency',
                        'restaurant_orders.currency_symbol',
                        'restaurant_orders.totalPayAmount',
                        'restaurant_orders.payment_type',
                        'restaurant_orders.order_date',
                        'restaurant_foods.food_name',
                        'restaurant_foods.food_img',
                        'restaurant_foods.price',
                    )
                    ->crossJoin('restaurant_orders', function ($join) use ( $cust_id) {
                        $join->on('restaurant_foods.id', '=', 'restaurant_orders.food_id')
                            ->where('restaurant_orders.cust_id', '=', $cust_id);
                    })
                    ->orderBy('restaurant_orders.id', 'DESC')
                    ->get();
                    // dd($this->OrderedcartList);
        } else {
            return $this->redirect('/login', navigate: true);
        }


        
    }
    
    public function render()
    {
        $title = __('message.My Ordered Foods');
        return view('livewire.website.dashboard.restaurant-food-order-list')->title($title);
    }
}
