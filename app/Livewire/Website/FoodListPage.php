<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\RestaurantFood;

class FoodListPage extends Component
{
    public $restaurant_id, $cat_id=Null, $RestaurantDetails, $calegoryList, $foodList, $restaurantList;
    // public $modalStatus = true;

    // public function openModal(){
    //         $this->modalStatus = true;
    // }

    // public function closeModal(){
    //     $this->modalStatus = false;
    // }

    // public $showPopup = false;

    // public function openPopup()
    // {
    //     $this->showPopup = true;
    // }

    // public function closePopup()
    // {
    //     $this->showPopup = false;
    // }

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
