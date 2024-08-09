<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;

use App\Models\Customer;
use App\Models\ShipAddresse;
use Livewire\Attributes\Rule; 
use Session;

class ShipingAddressForm extends Component
{
    public $sessUser, $shipAddressData;

    #[Rule('required')]
    public  $name, $mobile, $address, $city, $state, $zip, $country, $landmark;

    public function mount()
    {
       
        if (!empty(Session::get('memberdata'))) {
            $this->sessUser = Session::get('memberdata');
            $this->shipAddressData = ShipAddresse::where('cust_id', $this->sessUser['id'])->first();
            // dd($this->shipAddressData);
            if(!empty($this->shipAddressData)){
                $this->name= $this->shipAddressData->name;
                $this->mobile = $this->shipAddressData->mobile;
                $this->address = $this->shipAddressData->address;
                $this->city = $this->shipAddressData->city;
                $this->state = $this->shipAddressData->state;
                $this->zip = $this->shipAddressData->zip;
                $this->country = $this->shipAddressData->country;
                $this->landmark = $this->shipAddressData->landmark;
            }
            
            
        } else {
            return $this->redirect('/login', navigate: true);
        }
    }

    public function updateshippingaddress()
    {
        $validated = $this->validate();
        dd($validated);
        try {
            $this->shipAddressData->update($validated);
            $msg = __('message.Profile updated Successfully!');
            $this->dispatch('toast', message: $msg, notify: 'success');
            return $this->redirect('/dashboard', navigate: true);
        } catch (\Exception $e) {
            // Log the error message
            \Log::error($e->getMessage());
        }
    }


    public function render()
    {
        $title = __('message.My shipping address');
        return view('livewire.website.dashboard.shiping-address-form')->title($title);
    }
}
