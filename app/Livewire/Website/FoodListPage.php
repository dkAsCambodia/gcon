<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\RestaurantFood;
use App\Models\RestaurantCart;
use Session;

class FoodListPage extends Component
{
    public $restaurant_id, $cat_id=Null, $RestaurantDetails, $calegoryList, $foodList, $restaurantList;

    public function addToCart($encodedFoodId)
    {
        // Generate unique customerId for session
        if(Session::get('guest_Cust_id')){
            $uniqueId = Session::get('guest_Cust_id');
        }else{
            date_default_timezone_set('Asia/Phnom_Penh');
            // Generate the unique ID
            $uniqueId = date('dmYHi');
            Session::put('guest_Cust_id', $uniqueId);
        }
        // Generate unique customerId for session

        $data=array(
            'customer_id' =>$uniqueId,
            'food_id' => base64_decode($encodedFoodId),
            'f_qty' => '1',
        );
        RestaurantCart::create($data);
        $msg =  __('message.Added Successfully!');
        $this->dispatch('toast', message: $msg, notify:'success' ); 
       
        
    }

    public function mount($restaurant_id, $cat_id=Null)
    {
        $this->RestaurantDetails=Restaurant::where(['status' => '1', 'id' => base64_decode($restaurant_id)])->first();
        $this->restaurantList=Restaurant::where('status', '1')->where('id', '!=', base64_decode($restaurant_id))->orderBy('id', 'DESC')->get();
        $this->calegoryList=RestaurantCategory::where(['cat_status' => '1', 'restaurant_id' => base64_decode($restaurant_id)])->orderBy('id', 'DESC')->get();
        if(!empty($cat_id)){
            //  dd(base64_decode($cat_id));
            $this->foodList=RestaurantFood::where(['food_status' => '1', 'restaurant_id' => base64_decode($restaurant_id), 'restaurant_cat_id' => base64_decode($cat_id)])->orderBy('id', 'DESC')->get();
        }else{
            $this->foodList=RestaurantFood::where(['food_status' => '1', 'restaurant_id' => base64_decode($restaurant_id)])->orderBy('id', 'DESC')->get();
        }
        
        // dd($this->foodList);
    }

    public function render()
    {
        $title =   __('message.Enjoy Restaurant Menu | Online order on GCON');
        return view('livewire.website.food-list-page')->title($title);
    }
}
