<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\RestaurantFood;

class FoodListPage extends Component
{
    public $restaurant_id, $cat_id=Null, $calegoryList, $foodList;


    public function mount($restaurant_id, $cat_id=Null)
    {
        // dd(base64_decode($restaurant_id));
        $this->calegoryList=RestaurantCategory::where(['cat_status' => '1', 'restaurant_id' => base64_decode($restaurant_id)])->orderBy('id', 'DESC')->get();
        if(!empty($cat_id)){
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
