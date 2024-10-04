<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DeliveryBoy extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function gbookingdata()
    {
        return $this->belongsTo(TblGbooking::class,  'BookingType', 'id');
    }

    public function deliverBoyLoginData()
    {
        return $this->belongsTo(User::class,  'DeleveryBoyLoginId', 'id');
    }

     //Created by dk for DeliveryBoy
     public function scopeOwner(Builder $query)
     {
         $deliveryboy = DeliveryBoy::where('DeleveryBoyLoginId', auth()->id())->first();
         if($deliveryboy){
             $query = $query->where('id', $deliveryboy->id);
         }
         return $query;
     }
     //Created by dk for DeliveryBoy
}
