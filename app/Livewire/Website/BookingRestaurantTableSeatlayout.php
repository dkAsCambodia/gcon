<?php
namespace App\Livewire\Website;
use Livewire\Component;
use DB;
use Session;
use Livewire\Attributes\Rule;
use App\Models\Currency;
use App\Models\Restaurant;
use App\Models\Timeslot;
use App\Models\BookingrestauranttableTransaction;
use Illuminate\Support\Str;

class BookingRestaurantTableSeatlayout extends Component
{
    public $restaurantData, $timeslotList, $currencydata, $special_request;
    public $loading = false;
     #[Rule('required')]
    public $date, $time, $name, $email, $address, $paymentType, $preferredSeats='Other', $flat_fee='100';
     #[Rule('required|numeric')]
    public $no_of_people, $quantity, $phone;

    public function mount($restaurant_id)
    {
        $this->date = now()->toDateString();
        $this->restaurantData=Restaurant::where(['id' => base64_decode($restaurant_id), 'status' => '1'])->first();
        $this->timeslotList=Timeslot::where(['status' => '1'])->orderBy('orderby', 'asc')->get();
       
    }
   

    public function saveRestaurantBookingForm()
    {
        $validated = $this->validate();
        // Reset the loading state
        sleep(1);
        $this->loading = false;
        $concertFormPage = new ConcertFormPage();
        $userId = $concertFormPage->getuserId($this->name, $this->phone, $this->email, $this->address);
        $this->currencydata=Currency::where(['currency_code' => 'THB'])->first();
        date_default_timezone_set('Asia/Phnom_Penh');
        $created_at=date("Y-m-d h:i:s");
        $order_key = $this->generateTrackingKey();
        $data=array(
            'GBooking_id'               => $this->restaurantData->GBookingId,
            'restaurant_id'             => $this->restaurantData->id,
            'order_key'                 => $order_key,
            'user_id'                   => $userId,
            'name'                      => $this->name,
            'phone'                     => $this->phone,
            'email'                     => $this->email,
            'address'                   => $this->address,
            'no_of_people'              => $this->no_of_people,
            'preferredSeats'            => $this->preferredSeats,
            'quantity'                  => $this->quantity,
            'special_request'           => $this->special_request,
            'paymentType'               => $this->paymentType,
            'date'                      => $this->date,
            'time'                      => $this->time,
            'total_amount'              => $this->flat_fee,
            'currency'                  => $this->currencydata->currency_code,
            'currency_symbol'           => $this->currencydata->currency_symbol,
            'status'                    => 'pending',
            'created_at' =>  $created_at
        );
        $newTrnasaction = BookingrestauranttableTransaction::create($data);
        dd($data);
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

    function generateTrackingKey()
    {
        // Format: YYYYMMDDHHSS
        $prefix = now()->format('YmdHis');

        // Add random 4 digits to make total 16 digits
        $randomDigits = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

        return $prefix . $randomDigits;
    }

    public function render()
    {
        $title =    __('message.Booking Restaurant Table Form');
        return view('livewire.website.booking-restaurant-table-seatlayout')->title($title);
    }
}
