<?php
namespace App\Livewire\Website;
use Livewire\Component;

use App\Models\Event;

class EventFormPage extends Component
{

    public $event, $seatlist;
    public function mount($event_id)
    {
        $this->event=Event::where(['id' => base64_decode($event_id), 'status' => '1'])->first();
        // echo "<pre>"; print_r($data); die;
        // dd($this->event);
    }

    public function render()
    {
        $title =    __('message.Booking Events Table Form');
        return view('livewire.website.event-form-page')->title($title);
    }
}
