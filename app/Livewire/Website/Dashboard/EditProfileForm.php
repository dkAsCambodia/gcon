<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;
use App\Models\MemberType;
use App\Models\AuthorizedBye;
use App\Models\Customer;
use Livewire\Attributes\Rule; 
use Session;
use Illuminate\Support\Facades\DB;

class EditProfileForm extends Component
{
    public $card_number, $phone, $email;
    public $sessUser, $customer, $memberTypeName, $authorizedByName;
    // this rule is working for onsubmit and ontype validation
    #[Rule('required')]
    public $name, $country;
   
    #[Rule('')]
    public $address, $line_id, $facebook_id, $instagram;
    public function mount()
    {
       
        if (!empty(Session::get('memberdata'))) {
            $this->sessUser = Session::get('memberdata');
            $this->customer = Customer::find($this->sessUser['id']);
            // dd($this->sessUser);
            $this->card_number = $this->customer->card_number;
            $this->name= $this->customer->name;
            $this->phone = $this->customer->phone;
            $this->email = $this->customer->email;
            $this->address = $this->customer->address;
            // $this->city = $this->customer->city;
            // $this->state = $this->customer->state;
            $this->phone = $this->customer->phone;
            $this->country = $this->customer->country;
            $this->line_id = $this->customer->line_id;
            $this->facebook_id = $this->customer->facebook_id;
            $this->instagram = $this->customer->instagram;
            $this->memberTypeName = MemberType::where(['id' => $this->sessUser['member_type']])->value('member_type_name');
            $this->authorizedByName = AuthorizedBye::where(['id' => $this->sessUser['issue_by']])->value('authorized_by');
        } else {
            return $this->redirect('/login', navigate: true);
        }
    }

    // OnKeyUp validation in field START
    // public function updated($field)
    // {
    //     $this->validateOnly($field, [
    //         'name' => 'required',
    //         'city' => 'required',
    //         'state' => 'required',
    //         'country' => 'required',
    //     ]);
    // }
    // OnKeyUp validation in field END

    public function update()
    {
        $validated = $this->validate();
        // dd($data);
        try {
            $this->customer->update($validated);
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
        $title = __('message.Update Profile');
        return view('livewire.website.dashboard.edit-profile-form')->title($title);
    }
}
