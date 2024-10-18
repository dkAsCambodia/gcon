<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SittingLayout extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getSittingTabledata()
    {
        return $this->belongsTo(SittingTableType::class, 'sitting_table_type_id', 'id');
    }
}
