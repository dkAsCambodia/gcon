<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\TableCategory;
use App\Models\Bookingtable;
use App\Models\Event;
use App\Models\SittingLayout;
use App\Models\SittingTableType;
use App\Models\EventTransaction;
use Session;
use Livewire\WithDispatchesEvents;
use DB;

class EventInvoicePage extends Component
{
    public $amount, $currencySymbol, $currency, $recordId;
    public $transaction, $BookedtableList, $eventDetails, $subtotal = 0, $charge=10;

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
        $this->eventDetails=Event::where(['id' => $this->transaction->event_id, 'status' => '1'])->first();
        $this->cancelButtonShow = $this->transaction->cancel_status;

        @$tableArr = json_decode($this->transaction->table_arr, true);
       
        $results = [];
        
        foreach ($tableArr as $layoutId) {
            $data = DB::table('sitting_layouts')
                ->join('sitting_table_types', 'sitting_layouts.sitting_table_type_id', '=', 'sitting_table_types.id')
                ->join('currencies', 'sitting_table_types.currency_id', '=', 'currencies.id')
                ->where('sitting_layouts.id', $layoutId)
                ->select('sitting_table_types.price', 'sitting_table_types.currency_id', 'sitting_layouts.id', 'sitting_layouts.table_name', 'currencies.currency_code', 'currencies.currency_symbol')
                ->first();

            if ($data) {
                $results[] = $data;
                $this->subtotal += $data->price;
            }
        }
        $this->BookedtableList=$results;
        // echo "<pre>"; print_r($this->BookedtableList); die;
        
    }

    public function render()
    {
        $title =    __('message.Gcon Events Invoice');
        return view('livewire.website.event-invoice-page')->title($title);
    }
}
