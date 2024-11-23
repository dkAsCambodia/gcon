<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;

use Session;
use DB;
use App\Models\Event;
use App\Models\SittingTableType;
use App\Models\Currency;
use App\Models\SittingLayout;
use App\Models\EventTransaction;

class EventBookingList extends Component
{

    public $sessUser, $transactions;
    public function mount()
    {
        if (!empty(Session::get('memberdata'))) {
            $this->sessUser = Session::get('memberdata');
            $this->transactions = EventTransaction::where('user_id', $this->sessUser['id'])->with('getEvent')->orderBy('id', 'desc')->get();
            foreach ($this->transactions as $transaction) {
                // Decode table_arr column
                $tableArr = json_decode($transaction->table_arr, true);
                $results = [];
                // Check if $tableArr is valid and an array
                if (is_array($tableArr)) {
                    foreach ($tableArr as $layoutId) {
                        // Fetch related data for each layoutId
                        $data = DB::table('sitting_layouts')
                            ->join('sitting_table_types', 'sitting_layouts.sitting_table_type_id', '=', 'sitting_table_types.id')
                            ->join('currencies', 'sitting_table_types.currency_id', '=', 'currencies.id')
                            ->where('sitting_layouts.id', $layoutId)
                            ->select(
                                'sitting_layouts.id',
                                'sitting_layouts.table_name',
                            )
                            ->first();
                        // If data exists, add to results and update subtotal
                        if ($data) {
                            $results[] = $data;
                        }
                    }
                    // Assign the results back to the transaction's table_arr column
                    $transaction->table_arr = $results;
                }
            }
            // echo "<pre>"; print_r($this->transactions); die;
        } else {
            return $this->redirect('/login', navigate: true);
        }
    }

    public function render()
    {
        $title = __('message.My Events booking');  
        return view('livewire.website.dashboard.event-booking-list')->title($title);
    }
}
