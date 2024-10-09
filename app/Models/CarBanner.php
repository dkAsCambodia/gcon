<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBanner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function gbookingdata()
    {
        return $this->belongsTo(TblGbooking::class,  'GBooking_id', 'id');
    }
}
