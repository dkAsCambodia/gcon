<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantTranslation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function languages()
    {
        return $this->belongsTo(Language::class,  'language_id', 'id');
    }

    public function restaurantData()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }
}
