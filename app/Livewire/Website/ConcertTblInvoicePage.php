<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\TableCategory;
use App\Models\Bookingtable;
use App\Models\ConcertTblTransaction;
use Session;

class ConcertTblInvoicePage extends Component
{
    public $amount, $currencySymbol, $currency, $recordId;
    public $transaction, $categorydata, $tableDetails;

    public function mount()
    {
        $this->transaction = ConcertTblTransaction::where('id', base64_decode($this->recordId))->first();
        $this->categorydata=TableCategory::where(['id' => $this->transaction->cat_id,'status' => '1', 'GBooking_id' => '1'])->first();
        $this->tableDetails=Bookingtable::where(['id' => $this->transaction->tableId, 'tbl_status' => '1', 'deleteStatus' => '0'])->first();
    }

    public function render()
    {
        $title =    __('message.Gcon Invoice');
        return view('livewire.website.concert-tbl-invoice-page')->title($title);
    }
}
