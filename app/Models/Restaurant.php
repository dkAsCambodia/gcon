<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function getsellerData()
    {
        return $this->belongsTo(Seller::class,  'sellerId', 'id');
    }

    public function gbookingdata()
    {
        return $this->belongsTo(TblGbooking::class,  'GBookingId', 'id');
    }
}
