<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\TableCategory;
use App\Models\Bookingtable;
use App\Models\Event;
use App\Models\EventTransaction;
use Session;
use Livewire\WithDispatchesEvents;

class EventInvoicePage extends Component
{
    public $amount, $currencySymbol, $currency, $recordId;
    public $transaction, $categorydata, $eventDetails;

    public $record_id, $cancelButtonShow;
    protected $listeners = ['cancelConcertTicket' => 'CancelBookingFun'];

    public function cancelButtonfun($id){
      
        $this->record_id = $id;
        $this->dispatch('show-cancel-confirmation');
    }

    public function CancelBookingFun(){
      
        $data= EventTransaction::find($this->record_id);
        $data->update(['cancel_status' => '1']);
        $this->cancelButtonShow = '1';
        $this->dispatch('ticketCancelled');
    }


    public function mount()
    {
        $this->transaction = EventTransaction::where('id', base64_decode($this->recordId))->first();
        $this->cancelButtonShow = $this->transaction->cancel_status;
        $this->categorydata=TableCategory::where(['id' => $this->transaction->cat_id,'status' => '1', 'GBooking_id' => '1'])->first();
        $this->eventDetails=Event::where(['id' => $this->transaction->event_id, 'status' => '1'])->first();
    }

    public function render()
    {
        $title =    __('message.Gcon Events Invoice');
        return view('livewire.website.event-invoice-page')->title($title);
    }
}
