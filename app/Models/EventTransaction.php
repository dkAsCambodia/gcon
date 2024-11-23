<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTransaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getEvent()
    {
        return $this->belongsTo(Event::class,  'event_id', 'id');
    }
}
