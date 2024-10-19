<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SittingTableType extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sittingLayouts()
    {
        return $this->hasMany(SittingLayout::class, 'sitting_table_type_id');
    }
}
