<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Support\Facades\DB;

class RestaurantPage extends Component
{
    public $restaurantList, $menuList;

    public function mount()
    {
        
        $this->restaurantList=Restaurant::where(['openStatus' => '1', 'status' => '1'])->orderBy('id', 'desc')->get();
        $this->menuList = RestaurantCategory::select('cat_name', \DB::raw('MAX(restaurant_id) as restaurant_id'), \DB::raw('MAX(id) as id'))
    ->where('cat_status', '1')
    ->groupBy('cat_name') // Group by cat_name to make it unique
    ->orderBy('id', 'DESC')
    ->get();
 
        // dd($this->menuList);
    }

    public function render()
    {
        $title =    __('message.Grand Delivery in GCON');
        return view('livewire.website.restaurant-page')->title($title);
    }
}
