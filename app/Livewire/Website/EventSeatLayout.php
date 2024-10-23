<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Event;
use App\Models\SittingTableType;
use App\Models\Currency;
use App\Models\SittingLayout;
use DB;


class EventSeatLayout extends Component
{
    public $event, $seatlist, $sitting_layouts; 
    public function mount($event_id)
    {
        $this->event=Event::where(['id' => base64_decode($event_id), 'status' => '1'])->first();
        $SittingTableType = SittingTableType::where('sitting_for', 'events')->orderBy('order','ASC')->get();

        $data = [];
        foreach ($SittingTableType as $seatTyperow) {
            $record = SittingLayout::select(['id', 'sitting_table_type_id', 'table_name', 'order', 'status'])
                ->where('sitting_table_type_id', $seatTyperow->id)->orderBy('order','ASC')->get();
    
            $data[] = (object) [
                'id' => $seatTyperow->id,
                'sitting_for' => $seatTyperow->sitting_for,
                'sitting_table_name' => $seatTyperow->sitting_table_name,
                'price' => $seatTyperow->price,
                'currency_id' => $seatTyperow->currency_id,
                'currency_name' => Currency::where('id', $seatTyperow->currency_id)->value('currency_symbol'),
                'layoutRecord' => $record,
            ];
        }
        // echo "<pre>"; print_r($data); die;
        $this->seatlist=$data;

    }

    public function saveTable(){
        dd($this->sitting_layouts);
    }

    public function render()
    {
        $title =    __('message.Special Events');
        return view('livewire.website.event-seat-layout')->title($title);
    }

}
