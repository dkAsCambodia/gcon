<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\DeliveryBoy;
use App\Models\TblGbooking;
use Livewire\Attributes\Rule;
use App\Models\User;

class RestaurantDeliveryBoyForm extends Component
{
    public $BookingTypeList='',$businessType='2', $submitform=false;

    #[Rule('required')]
    public $name, $address, $city, $zip, $state, $country, $landmark;
    #[Rule('required|numeric|unique:users')]
    public $phoneNumber;
    #[Rule('required|email|max:255|unique:users')]
    public $email;
   
    public function mount()
    {
        $this->BookingTypeList=TblGbooking::where(['status' => '1', 'recognize' => 'GBooking'])->get();
        $this->businessType='2';
    }

    public function saveSeller()
    {
        $validated = $this->validate();
        date_default_timezone_set('Asia/Phnom_Penh');
        $created_at=date("Y-m-d h:i:s");

        $NewUser = User::create([
            'name'          => $this->name,
            'phoneNumber'   => $this->phoneNumber,
            'email'         => $this->email,
            'role'          => 'DeliverBoy',
            'password'      => 'password',
        ]);

        $date = date('dmY');
        $DeliveryBoyId = "GCON".$date.$NewUser->id;
        
        $data=array(
            'BookingType'  => $this->businessType,
            'DeleveryBoyLoginId' => $NewUser->id,
            'DeliveryBoyId'      => $DeliveryBoyId,
            'name'     => $this->name,
            'mobile'      => $this->phoneNumber ?? '',
            'address'       => $this->address,
            'city'          => $this->city,
            'zip'       => $this->zip,
            'state'       => $this->state,
            'country'       => $this->country,
            'landmark'     => $this->landmark,
            'created_at'    => $created_at
        );
        DeliveryBoy::create($data);
                // For Toster START
        $msg =  __('message.Registered Successfully!');
        $this->dispatch('toast', message: $msg, notify:'success' );
                // For Toster START
        $this->reset();
        $this->submitform=True;
    }


    public function render()
    {
        $title =   __('message.Delivery Boy Registration');
        return view('livewire.website.restaurant-delivery-boy-form')->title($title);
    }
}
