<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\TableCategory;
use App\Models\Bookingtable;
use App\Models\ConcertTblTransaction;
use Session;
use Livewire\WithDispatchesEvents;

class ConcertTblInvoicePage extends Component
{
    public $amount, $currencySymbol, $currency, $recordId;
    public $transaction, $categorydata, $tableDetails;

    public $record_id, $cancelButtonShow;
    protected $listeners = ['cancelConcertTicket' => 'CancelBookingFun'];

    public function cancelButtonfun($id){
      
        $this->record_id = $id;
        $this->dispatch('show-cancel-confirmation');
    }

    public function CancelBookingFun(){
      
        $data= ConcertTblTransaction::find($this->record_id);
        $data->update(['cancelStatus' => '1']);
        $this->cancelButtonShow = '1';
        $this->dispatch('ticketCancelled');
    }


    public function mount()
    {
        $this->transaction = ConcertTblTransaction::where('id', base64_decode($this->recordId))->first();
        $this->cancelButtonShow = $this->transaction->cancelStatus;
        $this->categorydata=TableCategory::where(['id' => $this->transaction->cat_id,'status' => '1', 'GBooking_id' => '1'])->first();
        $this->tableDetails=Bookingtable::where(['id' => $this->transaction->tableId, 'tbl_status' => '1', 'deleteStatus' => '0'])->first();
    }


    public function render()
    {
        $title =    __('message.Gcon Invoice');
        return view('livewire.website.concert-tbl-invoice-page')->title($title);
    }
}
