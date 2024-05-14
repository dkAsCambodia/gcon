<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcertTblTransaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bookingTable()
    {
        return $this->belongsTo(BookingTable::class,  'tableId', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(TableCategoryTranslation::class,  'cat_id', 'table_category_id')->where('language_id', '1');
    }

    public function gbookingdata()
    {
        return $this->belongsTo(TblGbooking::class,  'GBooking_id', 'id');
    }

    public function Customerdata()
    {
        return $this->belongsTo(Customer::class,  'user_id', 'id');
    }
}
