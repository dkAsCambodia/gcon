<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Rule;
use App\Mail\ForgetPassMail;
use Illuminate\Support\Facades\Mail;

class ForgetPassForm extends Component
{
    #[Rule('required|email')]
    public $email;
    public $user, $showDiv= false;
    
    public function CheckUser()
    {
            $validated = $this->validate();
            $this->user=Customer::where('email', $validated['email'])->first();
            if(!empty($this->user)){
                // $this->showDiv= true;
                $this->sendEmail($this->user);
                $this->reset();
            }else{
                $msg = __('message.Email not registered with us!');
                $this->dispatch('toast', message: $msg, notify: 'warning');
            } 
       
    }

    public function sendEmail($userData) 
    {
        Mail::to($userData->email)->send(new ForgetPassMail($userData));
        $msg =  __('message.Email sent successfully! Please check your mail');
        $this->dispatch('toast', message: $msg, notify:'success' ); 
    }

    public function render()
    {
        $title =   __('message.Forget password');
        return view('livewire.website.forget-pass-form')->title($title);
    }
}
