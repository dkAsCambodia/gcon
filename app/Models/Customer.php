<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function members()
    {
        return $this->belongsTo(MemberType::class,  'member_type', 'id');
    }

    public function assignby()
    {
        return $this->belongsTo(AuthorizedBye::class,  'issue_by', 'id');
    }
}
