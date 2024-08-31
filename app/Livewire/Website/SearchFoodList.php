<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Restaurant;
use App\Models\RestaurantFood;
use App\Models\RestaurantFoodTranslation;

class SearchFoodList extends Component
{

    public $search, $filterdata;
    public function mount($searchValue)
    {
        $this->search=base64_decode($searchValue);
        $this->filterdata = RestaurantFoodTranslation::where('food_translation_name', 'like', '%' . $this->search . '%')
                ->orWhere('translation_title', 'like', '%' . $this->search . '%')
                ->orWhere('translation_desc', 'like', '%' . $this->search . '%')
                ->get();
        dd($this->filterdata);
    }



    public function render()
    {
        return view('livewire.website.search-food-list');
    }
}
