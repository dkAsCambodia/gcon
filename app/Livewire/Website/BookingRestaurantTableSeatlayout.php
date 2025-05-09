<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Event;
use App\Models\SittingTableType;
use App\Models\Currency;
use App\Models\SittingLayout;
use App\Models\EventTransaction;
use DB;
use Session;

use App\Models\Restaurant;

class BookingRestaurantTableSeatlayout extends Component
{
    public $restaurantData;
    public $date, $time, $no_of_people, $name, $email, $phone, $address, $paymentType, $preferredSeats='Other', $flat_fee='100';

    public function mount($restaurant_id)
    {
        $this->date = now()->toDateString();
        $this->restaurantData=Restaurant::where(['id' => base64_decode($restaurant_id), 'status' => '1'])->first();
        // $SittingTableType = SittingTableType::where('sitting_for', 'events')->orderBy('order','ASC')->get();
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

    public function render()
    {
        $title =    __('message.Booking Restaurant Table Form');
        return view('livewire.website.booking-restaurant-table-seatlayout')->title($title);
    }
}
