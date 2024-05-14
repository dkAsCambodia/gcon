<?php
namespace App\Livewire\Website\Dashboard;
use Livewire\Component;
use App\Models\Bookingtable;
use App\Models\ConcertTblTransaction;
use Session;

class ConcertBookingList extends Component
{
    public $sessUser, $ConcertBookingList, $bookigTableName;
    public function mount()
    {
        if (!empty(Session::get('memberdata'))) {
            $this->sessUser = Session::get('memberdata');
            $this->ConcertBookingList = ConcertTblTransaction::where('user_id', $this->sessUser['id'])->with('bookingTable')->orderBy('id', 'desc')->get();
            // dd($this->ConcertBookingList);
        } else {
            return $this->redirect('/login', navigate: true);
        }
    }

    public function render()
    {
        $title = __('message.My concert booking');
        return view('livewire.website.dashboard.concert-booking-list')->title($title);
    }
}
