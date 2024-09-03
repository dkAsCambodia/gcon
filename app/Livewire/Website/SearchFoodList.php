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

class SearchFoodList extends Component
{

    public $search, $filterdata, $uniqueId, $totalCount, $calegoryList, $restaurantList, $cartCount;
    public function mount($searchValue)
    {
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

        $this->search=base64_decode($searchValue);
        $this->filterdata = $this->getSearchedFoods();
        $this->restaurantList=Restaurant::where('status', '1')->orderBy('id', 'DESC')->get();
        $this->calegoryList=RestaurantCategory::where('cat_status', '1')->orderBy('id', 'DESC')->get();
        //   dd($this->calegoryList);
    }

    public function getSerachDataFun()
    {
        return $this->redirect('/GBooking/restaurant/searchFood/'.base64_encode($this->search), navigate: true);
    }

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
        $this->filterdata = $this->getSearchedFoods();
        // Dispatch event to update cart count in header
        $this->dispatch('cartUpdated', $this->cartCount);

        $msg =  __('message.Added Successfully!');
        $this->dispatch('toast', message: $msg, notify:'success' ); 
        
    }

    public function getSearchedFoods(){
        $results = RestaurantFoodTranslation::where('food_translation_name', 'like', '%' . $this->search . '%')
                ->orWhere('translation_title', 'like', '%' . $this->search . '%')
                ->orWhere('translation_desc', 'like', '%' . $this->search . '%')
                ->get();
        $this->totalCount = RestaurantFoodTranslation::where('food_translation_name', 'like', '%' . $this->search . '%')
                    ->orWhere('translation_title', 'like', '%' . $this->search . '%')
                    ->orWhere('translation_desc', 'like', '%' . $this->search . '%')
                    ->count(); // Using count() to get the total number of records

        // Custom array logic
        $customArray = [];
        $customerId = $this->uniqueId;
        foreach ($results as $result) {
            // Customize the array as needed
            $customArray[] = RestaurantFood::with(['translations' => function ($query) {
                        $query->where('language_id', Language::where('code', app()->getLocale())->first()?->id ?? 'en');
                    }])
                    ->leftJoin('restaurant_carts', function($join) use ($customerId) {
                        $join->on('restaurant_foods.id', '=', 'restaurant_carts.food_id')
                            ->where('restaurant_carts.order_status', '=', 0)
                            ->where('restaurant_carts.food_cart_status', '=', 1)
                            ->where('restaurant_carts.customer_id', '=', $customerId);
                    })
                    ->join('restaurants', 'restaurant_foods.restaurant_id', '=', 'restaurants.id') // Added join with restaurants table
                    ->select(
                        'restaurant_foods.id',
                        'restaurant_foods.food_name',
                        'restaurant_foods.food_img',
                        'restaurant_foods.price',
                        'restaurant_foods.discount',
                        'restaurant_foods.food_status',
                        'restaurant_foods.restaurant_id',
                        'restaurant_foods.seller_id',
                        'restaurant_foods.currency_id',
                        'restaurants.restaurantName', // Added restaurants.restaurantName column
                        DB::raw('IFNULL(SUM(restaurant_carts.f_qty), 0) as cart_qty')
                    )
                    ->where('restaurant_foods.food_status', 1)
                    ->where('restaurant_foods.id', $result->restaurant_food_id)
                    ->whereNull('restaurant_foods.deleted_at')
                    ->groupBy(
                        'restaurant_foods.id',
                        'restaurant_foods.food_name',
                        'restaurant_foods.food_img',
                        'restaurant_foods.price',
                        'restaurant_foods.discount',
                        'restaurant_foods.food_status',
                        'restaurant_foods.restaurant_id',
                        'restaurant_foods.seller_id',
                        'restaurant_foods.currency_id',
                        'restaurants.restaurantName' // Added to group by clause
                    )
                    ->orderBy('restaurant_foods.id', 'desc')
                    ->first();
            
        }
        return $customArray;
    }



    public function render()
    {
        return view('livewire.website.search-food-list');
    }
}
