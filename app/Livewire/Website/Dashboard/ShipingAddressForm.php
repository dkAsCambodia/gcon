<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;

use App\Models\Customer;
use App\Models\ShipAddresse;
use Livewire\Attributes\Rule; 
use Session;

class ShipingAddressForm extends Component
{
    public $sessUser, $shipAddressData, $ship_id, $previousURL;

    #[Rule('required')]
    public $name, $address, $city, $state, $country, $landmark;
    #[Rule('required|numeric')]
    public $mobile, $zip;

    public function mount()
    {
       
        if (!empty(Session::get('memberdata'))) {
            $this->sessUser = Session::get('memberdata');
            $this->shipAddressData = ShipAddresse::where('cust_id', $this->sessUser['id'])->first();
            // dd($this->shipAddressData);
            if(!empty($this->shipAddressData)){
                $this->ship_id= $this->shipAddressData->id;
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

        $this->previousURL = url()->previous();
    }

    public function updateshippingaddress()
    {
        $validated = $this->validate();
        // dd($validated);
        
        if(!empty($this->ship_id)){
            $this->shipAddressData->update($validated);
            $msg = __('message.Updated Successfully!');
            $this->dispatch('toast', message: $msg, notify: 'success');
            // return $this->redirect('/dashboard/shippingAddress', navigate: true);
        }else{
            $data=array(
                'cust_id'      => $this->sessUser['id'],
                'name'      => $this->name,
                'mobile'      => $this->mobile,
                'address'      => $this->address,
                'city'      => $this->city,
                'state'      => $this->state,
                'country'     => $this->country,
                'zip'      => $this->zip,
                'landmark'      => $this->landmark,
            );
            ShipAddresse::create($data);
            $msg = __('message.Added Successfully!');
            $this->dispatch('toast', message: $msg, notify: 'success');
        }
            
        
    }


    public function render()
    {
        $title = __('message.My shipping address');
        return view('livewire.website.dashboard.shiping-address-form')->title($title);
    }
}
