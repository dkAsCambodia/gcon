<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipAddresse extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function Customerdata()
    {
        return $this->belongsTo(Customer::class,  'cust_id', 'id');
    }
}
