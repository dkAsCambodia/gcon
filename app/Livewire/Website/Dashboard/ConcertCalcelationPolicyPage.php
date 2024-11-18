<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;
use Livewire\WithDispatchesEvents;
use App\Models\ConcertTblTransaction;
use App\Models\EventTransaction;
use Session;

class ConcertCalcelationPolicyPage extends Component
{
    public $botton ='inactive';
    public bool $checked = false;
    public $recordId, $type;

    protected $listeners = ['cancelConcertTicket' => 'CancelBookingFun'];

    public function mount($type=null)
    {
        $this->type = $type;
        // dd($this->record_id);
    }

    public function cancelButtonfun($id){
      
        $this->record_id = $id;
        $this->dispatch('show-cancel-confirmation');
    }

    public function CancelBookingFun(){
      
        if($this->type=='events'){
            $data= EventTransaction::find(base64_decode($this->recordId));
            $data->update(['cancel_status' => '1']);
        }else{
            $data= ConcertTblTransaction::find(base64_decode($this->recordId));
            $data->update(['cancelStatus' => '1']);
        }
        $this->cancelButtonShow = '1';
        $this->dispatch('ticketCancelled');
    }
  
    public function processMark()
    {
        if ($this->checked) {
            $this->botton= '';
        } else {
            $this->botton= 'inactive';
        }
    }

    public function render()
    {
        $title =    __('message.Cancellation Policy');
        return view('livewire.website.dashboard.concert-calcelation-policy-page')->title($title);
    }
}
