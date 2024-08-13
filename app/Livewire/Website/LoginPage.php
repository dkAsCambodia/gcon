<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Customer;
use App\Models\RestaurantCart;
use Session;

class LoginPage extends Component
{
        public $card_number, $phone, $password, $previousURL,$guest_id;

        public function mount()
        {
            $this->previousURL = url()->previous();
        }

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
                   // code for cart setup START
                        if(Session::get('guest_Cust_id')){
                            $this->guest_id = Session::get('guest_Cust_id');
                            RestaurantCart::where(['order_status' => '0', 'food_cart_status' => '1', 'customer_id' => $customer['id']])->delete();
                            RestaurantCart::where(['order_status' => '0', 'food_cart_status' => '1', 'customer_id' => $this->guest_id])->update(['customer_id' => $customer['id']]);
                            Session::forget('guest_Cust_id');
                        }
                        // code for cart setup END
                    $msg =  __('message.Login Successfully!');
                    $this->dispatch('toast', message: $msg, notify:'success' ); 
                    return $this->redirect($this->previousURL, navigate: true);
                   
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
