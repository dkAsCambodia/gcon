<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Event;

class EventSeatLayout extends Component
{
    public $event; 
    public function mount($event_id)
    {
        $this->event=Event::where(['id' => base64_decode($event_id), 'status' => '1'])->first();
        // dd($this->event);
    }

    public function render()
    {
        $title =    __('message.Special Events');
        return view('livewire.website.event-seat-layout')->title($title);
    }

}
