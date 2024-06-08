<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Seller;
use Livewire\WithFileUploads;
class RestaurantSellerFormPage extends Component
{
    use WithFileUploads;
    public $shopName, $businessType='Restaurant', $cuisine, $firstName, $lastName, $phone, $email, $city, $country, $address, $shopImage;
    

    public function saveSeller()
    {
        $imgName=$this->shopImage->store('images/restaurant/shop','public');
        dd($this);
    }





    public function render()
    {
        $title =    __('message.Parnter with Gcon');
        return view('livewire.website.restaurant-seller-form-page')->title($title);
    }
}
