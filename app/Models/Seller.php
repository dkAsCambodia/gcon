<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Seller extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function sellerLoginData()
    {
        return $this->belongsTo(User::class,  'sellerLoginId', 'id');
    }

     //Created by dk for seller
     public function scopeOwner(Builder $query)
     {
         $seller = Seller::where('sellerLoginId', auth()->id())->first();
         if($seller){
             $query = $query->where('id', $seller->id);
         }
         return $query;
     }
     //Created by dk for seller
}
