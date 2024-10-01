<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\TableCategory;
use App\Models\Bookingtable;
class ConcertPage extends Component
{
    public $categorydata;
    public $tableProductlist;
    public function mount()
    {
        $this->categorydata=TableCategory::where(['status' => '1', 'GBooking_id' => '1'])->where('id', '!=', 8)->orderBy('order', 'asc')->get();
        $this->tableProductlist=Bookingtable::where(['tbl_status' => '1', 'deleteStatus' => '0'])->orderBy('orderby', 'asc')->get();
        // dd($categorydata);
    }

    public function render()
    {
       $title =    __('message.GEntertainment concert');
        return view('livewire.website.concert-page')->title($title);
    }
}
