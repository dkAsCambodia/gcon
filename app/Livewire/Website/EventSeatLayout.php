<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Event;
use App\Models\SittingTableType;
use App\Models\SittingLayout;
use DB;


class EventSeatLayout extends Component
{
    public $event, $seatlist; 
    public function mount($event_id)
    {
        $this->event=Event::where(['id' => base64_decode($event_id), 'status' => '1'])->first();
        $SittingTableType = SittingTableType::where('sitting_for', 'events')->get();
        

        $record = [];  // Clear record array initialization
        $data = [];    // Initialize data array
        foreach($SittingTableType as $seatTyperow){

            $record = SittingLayout::select(['id', 'sitting_table_type_id', 'table_name', 'order', 'status'])->where('sitting_table_type_id', $seatTyperow->id)->get()->toArray();
            $data[] = array(
                'id' => $seatTyperow->id,
                'sitting_for' => $seatTyperow->sitting_for,
                'sitting_table_name' => $seatTyperow->sitting_table_name,
                'price' => $seatTyperow->price,
                'currency_id' => $seatTyperow->currency_id,
                'layoutRecord' => $record, 
            );
        }

        // echo "<pre>"; print_r($data);
        $this->seatlist=$data;

    }

    public function render()
    {
        $title =    __('message.Special Events');
        return view('livewire.website.event-seat-layout')->title($title);
    }

}
