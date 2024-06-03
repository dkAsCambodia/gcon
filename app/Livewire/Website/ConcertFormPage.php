<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\TableCategory;
use App\Models\Bookingtable;
use App\Models\Timeslot;
use App\Models\Customer;
use App\Models\ConcertTblTransaction;
use Session;

class ConcertFormPage extends Component
{
    public $categorydata;
    public $tableDetails;
    public $timeslotList;
    public $cat_id, $tbl_price, $date, $time, $no_of_people, $name, $email, $phone, $address, $paymentType, $preferredSeats='Other';
    // public $showDiv = false;
    public $loading = false;
    public $quantity=1;
    public function mount($tableId)
    {
       
        $this->date = now()->toDateString();
        $this->categorydata=TableCategory::where(['status' => '1', 'GBooking_id' => '1'])->orderBy('order', 'asc')->get();
        $this->tableDetails=Bookingtable::where(['id' => base64_decode($tableId), 'tbl_status' => '1', 'deleteStatus' => '0'])->first();
        $this->cat_id=$this->tableDetails->cat_id;
        $this->timeslotList=Timeslot::where(['status' => '1'])->orderBy('orderby', 'asc')->get();
        $this->paymentType = '';
        $this->tbl_price = $this->tableDetails->currencydata->currency_symbol.($this->tableDetails->tbl_price*$this->quantity);
        // $this->showDiv = false;
    }

    // OnKeyUp validation in field START
    public function updated($field){
        $this->validateOnly($field, [
            'quantity' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            // 'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'no_of_people' => 'required|numeric',
            'paymentType' => 'required',
            
        ]);
    }
        // OnKeyUp validation in field END

    public function updatedQuantity($value)
    {
        if(is_numeric($value)){
            $this->quantity = $value;
            $this->tbl_price = $this->tableDetails->currencydata->currency_symbol.$this->tableDetails->tbl_price*$value;
        }else{
            $value=1;
            $this->quantity = '1';
            $this->tbl_price = $this->tableDetails->currencydata->currency_symbol.$this->tableDetails->tbl_price*$value;
        }
        
    }

    public function saveconcertForm()
    {
        // Reset the loading state
        sleep(1);
        $this->loading = false;
        // $user_id='';
        // if(!empty(Session::get('memberdata'))){
        //     $userdata=Session::get('memberdata');
        //     $user_id=$userdata['id'];
        // }
       
        $validated = $this->validate([ 
            'quantity' => 'required|numeric',
            'date' => 'required',
            'time' => 'required',
            'name' => 'required',
            // 'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'no_of_people' => 'required|numeric',
            'paymentType' => 'required',
        ]);

        date_default_timezone_set('Asia/Phnom_Penh');
        $created_at=date("Y-m-d h:i:s");
        $userId = $this->getuserId($this->name, $this->phone, $this->email, $this->address);
        $data=array(
            'GBooking_id'               => $this->tableDetails->GBooking_id,
            'cat_id'                    => $this->cat_id,
            'tableId'                   => $this->tableDetails->id,
            'user_id'                   => $userId,
            'name'                      => $this->name,
            'phone'                     => $this->phone,
            'email'                     => $this->email,
            'address'                   => $this->address,
            'no_of_people'              => $this->no_of_people,
            'preferredSeats'            => $this->preferredSeats,
            'quantity'                  => $this->quantity,
            'paymentType'               => $this->paymentType,
            'concert_booking_date'      => $this->date,
            'concert_arrival_time'      => $this->time,
            'total_amount'              => $this->tableDetails->tbl_price*$this->quantity,
            'currency'                  => $this->tableDetails->currencydata->currency_code,
            'currency_symbol'           => $this->tableDetails->currencydata->currency_symbol,
            'status'                    => 'pending',
            'created_at' =>  $created_at
        );
        $newTrnasaction = ConcertTblTransaction::create($data);
        // if($this->paymentType=='online'){
        //     Session::put('sess_transaction_recordId', $newTrnasaction->id);
        //     return $this->redirect('/paymentOptions'.'/'.base64_encode($this->tableDetails->tbl_price*$this->quantity).'/'.$this->tableDetails->currencydata->currency_symbol.'/'.base64_encode($this->tableDetails->currencydata->currency_code), navigate: true);
        // }else{
        //     $msg =  __('message.Table Booked Successfully!');
        //     $this->dispatch('toast', message: $msg, notify:'success' ); 
        //     return $this->redirect('/invoice'.'/'.base64_encode($this->tableDetails->tbl_price*$this->quantity).'/'.$this->tableDetails->currencydata->currency_symbol.'/'.base64_encode($this->tableDetails->currencydata->currency_code).'/'.base64_encode($newTrnasaction->id), navigate: true);
        // }
        if($this->paymentType=='online'){
            Session::put('sess_transaction_recordId', $newTrnasaction->id);
        }
        //     return $this->redirect('/payment/privacypolicy'.'/'.base64_encode($this->tableDetails->tbl_price*$this->quantity).'/'.$this->tableDetails->currencydata->currency_symbol.'/'.base64_encode($this->tableDetails->currencydata->currency_code), navigate: true);
        // }else{
            // $msg =  __('message.Table Booked Successfully!');
            // $this->dispatch('toast', message: $msg, notify:'success' ); 
            return $this->redirect('/payment/privacypolicy'.'/'.base64_encode($this->tableDetails->tbl_price*$this->quantity).'/'.$this->tableDetails->currencydata->currency_symbol.'/'.base64_encode($this->tableDetails->currencydata->currency_code).'/'.base64_encode($newTrnasaction->id), navigate: true);
        
        
        
    }

    public function getuserId($name, $phone, $email, $address)
    {
        if(!empty(Session::get('memberdata'))){
            $userdata=Session::get('memberdata');
            $user_id=$userdata['id'];
            return $user_id;
        }else{
            $emailExists = Customer::where('email', $email)->first();
            // die($emailExists);
            if (!empty($emailExists) || $emailExists!='') {
                return $emailExists->id;
            }else{
                $lastCustomer = Customer::latest()->first();
                if (!empty($lastCustomer->card_number) || $lastCustomer->card_number!='' ) {
                    $lastcard_number = $lastCustomer->card_number;
                    $newStr = $this->incrementString($lastcard_number);
                    $NewUser = Customer::create([
                        'card_number' => $newStr,
                        'name' => $name,
                        'phone' => $phone,
                        'email' => $email,
                        'address' => $address,
                        'password' => base64_encode('password'),
                    ]);
                    return $NewUser->id;
                }
            }
        } 
    }

    public function incrementString($str) {
        // Extract numeric part from the string
        preg_match('/(\d+)$/', $str, $matches);
        // If numeric part exists, increment it; otherwise, default to 1
        $number = isset($matches[1]) ? intval($matches[1]) + 1 : 1;
        // Pad the number with leading zeros to maintain the original format
        $paddedNumber = sprintf("%05d", $number);
        // Replace the numeric part in the original string with the incremented value
        return preg_replace('/(\d+)$/', $paddedNumber, $str);
    }

    public function render()
    {
        $title =    __('message.Booking Concert Table Form');
        return view('livewire.website.concert-form-page')->title($title);
    }

   
}
