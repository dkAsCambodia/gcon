<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\MemberType;
use App\Models\AuthorizedBye;
use App\Models\Customer;
use Session;

class RegisterPage extends Component
{
   
    public $membertype=1, $card_number='G', $name, $phone, $email, $password, $issue_by=4, $address, $country, $line_id, $facebook_id, $instagram;
    public $latestSequence, $prefix;

    // OnKeyUp validation in field START
    public function updated($field){
        $this->validateOnly($field, [
            'membertype' => 'required',
            // 'card_number' => 'required|min:6|unique:customers',
            'card_number' => [
                'sometimes', 
                'required_if:membertype,1,2',
                'min:6', 
                'unique:customers'
            ],
            'name' => 'required',
            'email' => 'required|email|max:255|unique:customers',
            'phone' => 'required|numeric|unique:customers',
            // 'city' => 'required',
            // 'state' => 'required',
            'country' => 'required',
            'issue_by' => 'required',
            'password'  => 'required|min:8',
        ]);
    }

    public function updatedMembertype($value)
    {
       if($value=='1'){
            $this->card_number='G';
       }elseif($value=='2'){
            $this->card_number='D';
       }else{
            $latestCustomer = Customer::where('card_number', 'like', 'S%')->orderBy('created_at', 'desc')->first();
            if(!empty($latestCustomer)){
                // dd($latestCustomer->card_number);
                $this->latestSequence=$latestCustomer->card_number;
                $this->prefix ='S';
            }else{
                $this->latestSequence='S00000';
                $this->prefix ='S';
            }
            
            $this->card_number=$this->generateNextSequence($this->latestSequence);
       }
        
    }
        // OnKeyUp validation in field END

    public function generateNextSequence($cardNumber)
    {
        // Extract the numeric part from the current sequence
        $numberPart = substr($cardNumber, 1);
        // Convert the numeric part to an integer and increment it
        $nextNumber = (int)$numberPart + 1;
        // Pad the number with leading zeros to ensure it is 5 digits long
        $paddedNumber = str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        // Concatenate the prefix with the padded number
       return $this->prefix . $paddedNumber;
    }

    public function save()
    {
        $validated = $this->validate([ 
            'membertype' => 'required',
            // 'card_number' => 'required|min:6|unique:customers',
            'card_number' => [
                'sometimes', 
                'required_if:membertype,1,2',
                'min:6', 
                'unique:customers'
            ],
            'name' => 'required',
            'email' => 'required|email|max:255|unique:customers',
            'phone' => 'required|numeric|unique:customers',
            // 'city' => 'required',
            // 'state' => 'required',
            'country' => 'required',
            'issue_by' => 'required',
            'password'  => 'required|min:8',
        ]);
        date_default_timezone_set('Asia/Phnom_Penh');
        $created_at=date("Y-m-d h:i:s");
        if(Session::get('sessLocation')){
            $mobile_country_code = Session::get('sessLocation.mobile_country_code');
        }
        $data=array(
            'card_number'      => $this->card_number,
            'member_type'      => $this->membertype,
            'name'      => $this->name,
            'mobile_country_code'  => $mobile_country_code ?? 'not working',
            'phone'      => $this->phone,
            'email'      => $this->email,
            'password'   => base64_encode($this->password),
            'issue_by'      => $this->issue_by,
            'address'      => $this->address,
            // 'city'      => $this->city,
            // 'state'      => $this->state,
            'country'     => $this->country,
            'line_id'    => $this->line_id,
            'facebook_id' => $this->facebook_id,
            'instagram' => $this->instagram,
            'created_at' =>  $created_at
        );
        Customer::create($data);
                // For Toster START
        $msg =  __('message.Member Registered Successfully!');
        $this->dispatch('toast', message: $msg, notify:'success' );
                // For Toster START
        $this->reset();
        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        $title =   __('message.registerTitle');
        $members=MemberType::where('status', '1')->get();
        $AuthorizedBye=AuthorizedBye::where('status', '1')->get();
        // dd($AuthorizedBye);
        return view('livewire.website.register-page',compact('members','AuthorizedBye'))->title($title);
    }

}
