<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;
use App\Models\Customer;
use App\Models\MemberType;
use App\Models\AuthorizedBye;
use Session;

class ViewProfile extends Component
{
    public $sessUser, $customer, $memberTypeName, $authorizedByName;

    public function mount()
    {
        if(!empty(Session::get('memberdata'))){
            $this->sessUser = Session::get('memberdata');
            $this->customer = Customer::find($this->sessUser['id']);
            $this->memberTypeName=MemberType::where(['id' => $this->customer->member_type])->value('member_type_name');
            $this->authorizedByName=AuthorizedBye::where(['id' => $this->customer->issue_by])->value('authorized_by');
        }else{
            return $this->redirect('/login', navigate: true);
        }
    }
    
    public function render()
    {
        return view('livewire.website.dashboard.view-profile');
    }
}
