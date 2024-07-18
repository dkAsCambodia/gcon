<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantFoodTranslation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function languages()
    {
        return $this->belongsTo(Language::class,  'language_id', 'id');
    }

    public function RestaurantFoodData()
    {
        return $this->belongsTo(RestaurantFood::class, 'restaurant_food_id', 'id');
    }

    
}
