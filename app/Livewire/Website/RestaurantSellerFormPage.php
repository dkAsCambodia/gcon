<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\User;
use App\Models\Seller;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class RestaurantSellerFormPage extends Component
{
    use WithFileUploads;
    public $businessType='Restaurant', $submitform=false;

    #[Rule('required')]
    public $shopName,  $cuisine, $firstName, $lastName, $city, $country, $shopImage;
    #[Rule('required|numeric|unique:users')]
    public $phoneNumber;
    #[Rule('required|email|max:255|unique:users')]
    public $email;
    #[Rule('')]
    public $address;
    
    public function saveSeller()
    {
        $validated = $this->validate();
        $imgName=$this->shopImage->store('images/restaurant/shop','public');
        date_default_timezone_set('Asia/Phnom_Penh');
        $created_at=date("Y-m-d h:i:s");

        $NewUser = User::create([
            'name' => $this->firstName.' '.$this->lastName,
            'phoneNumber'   => $this->phoneNumber,
            'email'         => $this->email,
            'role'          => 'seller',
            'password'      => 'password',
        ]);
        
        $data=array(
            'sellerLoginId' => $NewUser->id,
            'shopName'      => $this->shopName,
            'businessType'  => $this->businessType,
            'cuisine'       => $this->cuisine,
            'firstName'     => $this->firstName,
            'lastName'      => $this->lastName ?? '',
            'address'       => $this->address,
            'city'          => $this->city,
            'country'       => $this->country,
            'shopImage'     => $imgName,
            'created_at'    => $created_at
        );
        Seller::create($data);
                // For Toster START
        $msg =  __('message.Seller Registered Successfully!');
        $this->dispatch('toast', message: $msg, notify:'success' );
                // For Toster START
        $this->reset();
        $this->submitform=True;
    }





    public function render()
    {
        $title =    __('message.Parnter with Gcon');
        return view('livewire.website.restaurant-seller-form-page')->title($title);
    }
}
