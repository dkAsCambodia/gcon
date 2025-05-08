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
        $title =    __('message.Booking Restaurant Table Form');
        return view('livewire.website.booking-restaurant-table-seatlayout')->title($title);
    }
}
