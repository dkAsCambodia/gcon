<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\RestaurantFood;
use App\Models\RestaurantFoodTranslation;
use App\Models\RestaurantCart;
use App\Models\Language;
use Session;
use Illuminate\Support\Facades\DB;

class FoodListPage extends Component
{
    public $restaurant_id, $cat_id=Null, $RestaurantDetails, $calegoryList, $foodList, $restaurantList, $FoodId, $cartCount, $uniqueId;
    
    public $search = ''; // Search term
    public $foods = []; 

    public function addToCart($encodedFoodId)
    {
        $this->FoodId = base64_decode($encodedFoodId);

        $existdata = RestaurantCart::where([ 'food_id' => $this->FoodId, 'order_status' => '0', 'customer_id' => $this->uniqueId])->first();
        if(!empty($existdata)){
            $old_qty= $existdata->f_qty;
            $finalQty=$old_qty + 1;
            RestaurantCart::where([ 'food_id' => $this->FoodId, 'customer_id' => $this->uniqueId])
            ->update([
                    'f_qty' => $finalQty,
                ]);
        }else{
            $data=array(
                'customer_id' =>$this->uniqueId,
                'food_id' => $this->FoodId,
                'f_qty' => '1',
            );
            RestaurantCart::create($data);
        }
        $TotalCartCount = RestaurantCart::where(['order_status' => '0', 'food_cart_status' => '1', 'customer_id' => $this->uniqueId])->sum('f_qty');
        $this->cartCount = $TotalCartCount;
        //get latest food with cart qty
        $this->foodList = $this->getFoods($this->cat_id);
        // Dispatch event to update cart count in header
        $this->dispatch('cartUpdated', $this->cartCount);

        $msg =  __('message.Added Successfully!');
        $this->dispatch('toast', message: $msg, notify:'success' ); 
        
    }

   
    public function mount($restaurant_id, $cat_id=Null)
    {
        $this->foods = [];
         // Generate unique customerId for session
        if(Session::get('memberdata')){
            $this->uniqueId = Session::get('memberdata')['id'];
        }elseif(Session::get('guest_Cust_id')){
            $this->uniqueId = Session::get('guest_Cust_id');
        }else{
            date_default_timezone_set('Asia/Phnom_Penh');
            // Generate the unique ID
            $this->uniqueId = date('dmYHi');
            Session::put('guest_Cust_id', $this->uniqueId);
        }
        // Generate unique customerId for session

        $this->RestaurantDetails=Restaurant::where(['status' => '1', 'id' => base64_decode($restaurant_id)])->first();
        $this->restaurantList=Restaurant::where('status', '1')->where('id', '!=', base64_decode($restaurant_id))->orderBy('id', 'DESC')->get();
        $this->calegoryList=RestaurantCategory::where(['cat_status' => '1', 'restaurant_id' => base64_decode($restaurant_id)])->orderBy('id', 'DESC')->get();
        // if(!empty($cat_id)){
        //     $this->foodList=RestaurantFood::where(['food_status' => '1', 'restaurant_id' => base64_decode($restaurant_id), 'restaurant_cat_id' => base64_decode($cat_id)])->orderBy('id', 'DESC')->get();
        // }else{
        //     $this->foodList=RestaurantFood::where(['food_status' => '1', 'restaurant_id' => base64_decode($restaurant_id)])->orderBy('id', 'DESC')->get();
        //     // dd( $this->foodList);
        // }

        $this->foodList = $this->getFoods($this->cat_id);
        // dd( $this->foodList);
    }

    public function updatedSearch()
    {
        if (strlen($this->search) > 1) {
            // $this->foods = RestaurantFoodTranslation::where('food_translation_name', 'like', '%' . $this->search . '%')->get();
            $this->foods = RestaurantFoodTranslation::where('food_translation_name', 'like', '%' . $this->search . '%')
                ->orWhere('translation_title', 'like', '%' . $this->search . '%')
                ->orWhere('translation_desc', 'like', '%' . $this->search . '%')
                ->get();
            // dd( $this->foods);
        } else {
            $this->foods = []; // Clear suggestions if input is too short
        }
    }

    public function getSerachDataFun() 
    {
        return $this->redirect('/GBooking/restaurant/searchFood/'.base64_encode($this->search), navigate: true);
    }

    public function getFoods($cat_id=Null){
        $catId = !empty($cat_id) ? base64_decode($cat_id) : null;
        $customerId = $this->uniqueId;
        $restaurantId = base64_decode($this->restaurant_id);

         return RestaurantFood::with(['translations' => function ($query) {
                            $query->where('language_id', Language::where('code', app()->getLocale())->first()?->id ?? 'en');
                        }])
                        ->leftJoin('restaurant_carts', function($join) use ($customerId) {
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
                            DB::raw('IFNULL(SUM(restaurant_carts.f_qty), 0) as cart_qty')
                        )
                        ->where('restaurant_foods.food_status', 1)
                        ->where('restaurant_foods.restaurant_id', $restaurantId)
                        ->whereNull('restaurant_foods.deleted_at')
                        ->when($catId, function ($query, $catId) {
                            $query->where('restaurant_foods.restaurant_cat_id', $catId);
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



    public function render()
    {
        $title =   __('message.Enjoy Restaurant Menu | Online order on GCON');
        return view('livewire.website.food-list-page')->title($title);
    }
}
