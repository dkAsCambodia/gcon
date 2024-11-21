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


class EventSeatLayout extends Component
{
    public $event, $seatlist, $BookedallSeatIds=null; 
    public function mount($event_id)
    {
        
        // $booked=EventTransaction::select('id','table_arr')->where(['event_id' => base64_decode($event_id), 'status' => 'success', 'cancel_status' => '0'])->get();

        $booked = EventTransaction::select('table_arr')
                ->where([
                    'event_id' => base64_decode($event_id),
                    'status' => 'success',
                    'cancel_status' => '0'
                ])->get();

            // Extract and merge seat_ids into a single array
            $this->BookedallSeatIds = $booked->pluck('table_arr') // Get all table_arr values
                ->map(function ($tableArr) {
                    return json_decode($tableArr, true); // Decode JSON to array
                })
                ->flatten() // Flatten into a single array
                ->unique() // Get unique seat_ids
                ->sort() // Sort in increasing order
                ->values() // Reindex the array
                ->toArray();
            //  dd($this->BookedallSeatIds);

        $this->event=Event::where(['id' => base64_decode($event_id), 'status' => '1'])->first();
        $SittingTableType = SittingTableType::where('sitting_for', 'events')->orderBy('order','ASC')->get();

        $data = [];
        foreach ($SittingTableType as $seatTyperow) {
            $record = SittingLayout::select(['id', 'sitting_table_type_id', 'table_name', 'order', 'status'])
                ->where('sitting_table_type_id', $seatTyperow->id)->where('status', '1')->orderBy('order','ASC')->get();
    
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

    // public $sitting_layouts = [];
    // public function toggleSelection($layoutId)
    // {
    //     if (in_array($layoutId, $this->sitting_layouts)) {
    //         // Remove if already selected
    //         $this->sitting_layouts = array_diff($this->sitting_layouts, [$layoutId]);
    //     } else {
    //         // Add if not selected
    //         $this->sitting_layouts[] = $layoutId;
    //     }

    // }

    public $sitting_layouts = [];
    public $totalPrice = 0;
    public function updatedSittingLayouts()
    {
        $this->calculateTotalPrice();
    }
    public function calculateTotalPrice()
    {
        $this->totalPrice = \DB::table('sitting_layouts')
            ->join('sitting_table_types', 'sitting_layouts.sitting_table_type_id', '=', 'sitting_table_types.id')
            ->whereIn('sitting_layouts.id', $this->sitting_layouts)
            ->sum('sitting_table_types.price');
    }
    public function toggleSelection($layoutId)
    {
        if (in_array($layoutId, $this->sitting_layouts)) {
            $this->sitting_layouts = array_diff($this->sitting_layouts, [$layoutId]);
        } else {
            $this->sitting_layouts[] = $layoutId;
        }
        $this->calculateTotalPrice();
    }


    public function saveTable()
    {
        $results = [];
        $totalPrice = 0;

        foreach ($this->sitting_layouts as $layoutId) {
            $data = DB::table('sitting_layouts')
                ->join('sitting_table_types', 'sitting_layouts.sitting_table_type_id', '=', 'sitting_table_types.id')
                ->join('currencies', 'sitting_table_types.currency_id', '=', 'currencies.id')
                ->where('sitting_layouts.id', $layoutId)
                ->select('sitting_table_types.price', 'sitting_table_types.currency_id', 'sitting_layouts.id', 'sitting_layouts.table_name', 'currencies.currency_code', 'currencies.currency_symbol')
                ->first();

            if ($data) {
                $results[] = $data;
                $totalPrice += $data->price;
            }
        }
        // dd([
        //     'results' => $results,
        //     'totalPrice' => $totalPrice, // Display the total price
        // ]);
        Session::put('results', $results);
        Session::put('totalPrice', $totalPrice);
        return $this->redirect('/GEntertainment/events/form'.'/'.base64_encode($this->event->id), navigate: true);
    }


    public function render()
    {
        $title =    __('message.Special Events');
        return view('livewire.website.event-seat-layout')->title($title);
    }

}
