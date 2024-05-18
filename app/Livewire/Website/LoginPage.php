<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Customer;
use Session;

class LoginPage extends Component
{
        public $card_number, $phone, $password;

        public function render()
        {
            $title =   __('message.Gcon Member Login');
            return view('livewire.website.login-page')->title($title);
        }
        // OnKeyUp validation in field START
        public function updated($field){
            $this->validateOnly($field, [
                'card_number' => 'required_without:phone|nullable|min:6',
                'phone' => 'required_without:card_number|nullable|numeric',
                'password'  => 'required|min:8',
            ]);
        }
        // OnKeyUp validation in field END
        public function loginCheck()
        {
            $validated = $this->validate([ 
                'card_number' => 'required_without:phone|nullable|min:6',
                'phone' => 'required_without:card_number|nullable|numeric',
                'password'  => 'required|min:8',
            ]);

            if(!empty($this->card_number)){
                $checkCustomer=Customer::where('card_number', $this->card_number)->get()->toArray();
            }else{
                $checkCustomer=Customer::where('phone', $this->phone)->get()->toArray();
            }
            // echo "<pre>"; print_r($checCustomer); die;
            if(!empty($checkCustomer)){
                $customer=$checkCustomer[0];
                
                if($customer['password'] == base64_encode($this->password)  ){
                    unset($customer['password']);
                    Session::put('memberdata', $customer);
                    $msg =  __('message.Login Successfully!');
                    $this->dispatch('toast', message: $msg, notify:'success' ); 
                    return $this->redirect('/dashboard', navigate: true);
                   
                }else{
                    $msg =  __('message.Invalid Password!');
                    $this->dispatch('toast', message: $msg, notify:'error' ); 
                }
            }else{
                $msg =  __('message.Invalid Gcon ID!');
                $this->dispatch('toast', message: $msg, notify:'error' ); 
            } 
            $this->reset();
            

        }
}
