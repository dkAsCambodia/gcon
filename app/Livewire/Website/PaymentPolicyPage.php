<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\ConcertTblTransaction;
use App\Models\EventTransaction;


class PaymentPolicyPage extends Component
{
    public $botton ='inactive';
    public bool $checked = false;
    public $amount, $currencySymbol, $currency, $recordId, $type = null;

    public function processMark()
    {
        if ($this->checked) {
            $this->botton= '';
        } else {
            $this->botton= 'inactive';
        }
    }

    public function privacyPolicyFun()
    {
        if(!empty($this->type) && $this->type == 'events'){
            // dd($this->type);
            $recordData = EventTransaction::where('id', base64_decode($this->recordId))->first();
            // dd($recordData);
            if($recordData->paymentType=='online'){
                return $this->redirect('/paymentOptions'.'/'.$this->amount.'/'.$this->currencySymbol.'/'.$this->currency, navigate: true);
            }
        }


        $recordData = ConcertTblTransaction::where('id', base64_decode($this->recordId))->first();
        // dd($recordData);
        if($recordData->paymentType=='online'){
            return $this->redirect('/paymentOptions'.'/'.$this->amount.'/'.$this->currencySymbol.'/'.$this->currency, navigate: true);
        }else{
            $msg =  __('message.Table Booked Successfully!');
            $this->dispatch('toast', message: $msg, notify:'success' ); 
            return $this->redirect('/invoice'.'/'.$this->amount.'/'.$this->currencySymbol.'/'.$this->currency.'/'.$this->recordId, navigate: true);
        }
    }


    public function render()
    {
        $title =    __('message.PRIVACY POLICY');
        return view('livewire.website.payment-policy-page')->title($title);
    }
}
