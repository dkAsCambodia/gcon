<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Event;
use App\Models\EventTransaction;
use Livewire\Attributes\Rule;
use Session;



class EventFormPage extends Component
{

    public $event, $seatlist, $charge=10, $totalprice, $currency_code, $currency_symbol;
    
    #[Rule('required')]
    public $name, $paymentType;
    #[Rule('required|numeric')]
    public $phone;
    #[Rule('')]
    public $email, $address;
    public $layoutTblArr = [];
    public function mount($event_id)
    {
        if(!empty(Session::get('totalPrice'))  &&  !empty(Session::get('results'))){
           
            $sessprice = Session::get('totalPrice');
            $this->totalprice= $sessprice + $this->charge;
            $this->event=Event::where(['id' => base64_decode($event_id), 'status' => '1'])->first();
            // echo "<pre>"; print_r($this->totalprice); die;
            $datas = Session::get('results');
          
            
            foreach($datas as $record){
                $this->currency_code=$record->currency_code;
                $this->currency_symbol=$record->currency_symbol;
                $this->layoutTblArr[] =  $record->id;
            }

        }else{
            return $this->redirect('/GEntertainment/events', navigate: true);
        }
       
    }

    public function saveNewEventTransaction()
    {
        $validated = $this->validate();
        date_default_timezone_set('Asia/Phnom_Penh');
        $created_at=date("Y-m-d h:i:s");
        $concertFormPage = new ConcertFormPage();
        $userId = $concertFormPage->getuserId($this->name, $this->phone, $this->email, $this->address);
        $data=array(
            'GBooking_id'         => $this->event->GBooking_id,
            'event_id'            => $this->event->id,
            'user_id'             => $userId ??  '',
            'name'                => $this->name,
            'phone'               => $this->phone,
            'email'               => $this->email,
            'address'             => $this->address,
            'table_arr'          => json_encode($this->layoutTblArr),
            'total_amount'        => $this->totalprice,
            'currency'            => $this->currency_code,
            'currency_symbol'     => $this->currency_symbol,
            'paymentType'         => $this->paymentType,
            'status'              => 'pending',
            'created_at'          => $created_at,
        );
        // dd($data);
        $newTrnasaction = EventTransaction::create($data);
                // For Toster START
            if($this->paymentType=='online'){
                Session::put('sessEventTransaction_recordId', $newTrnasaction->id);
                return $this->redirect('/payment/privacypolicy'.'/'.base64_encode($this->totalprice).'/'.$this->currency_symbol.'/'.base64_encode($this->currency_code).'/'.base64_encode($newTrnasaction->id), navigate: true);
            }
    }


    public function render()
    {
        $title =    __('message.Booking Events Table Form');
        return view('livewire.website.event-form-page')->title($title);
    }
}
