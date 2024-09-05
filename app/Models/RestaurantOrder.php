<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantOrder extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function restaurantData()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function getsellerData()
    {
        return $this->belongsTo(Seller::class,  'seller_id', 'id');
    }

    public function RestaurantFoodData()
    {
        return $this->belongsTo(RestaurantFood::class, 'food_id', 'id');
    }

    public function Customerdata()
    {
        return $this->belongsTo(Customer::class,  'cust_id', 'id');
    }

}
