<?php
namespace App\Livewire\Website;
use Livewire\Component;
use App\Models\Event;

class EventPage extends Component
{

    public $eventList;
    public function mount()
    {
        $this->eventList=Event::where(['status' => '1'])->orderBy('event_date', 'DESC')->get();
        // dd($this->eventList);
    }

    public function render()
    {
        $title =    __('message.Special Events');
        return view('livewire.website.event-page')->title($title);
    }
}
