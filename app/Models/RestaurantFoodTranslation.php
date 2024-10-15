<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    // Created by sushil sir for seller
    public function scopeOwner(Builder $query)
    {
        $seller = Seller::where('sellerLoginId', auth()->id())->first();
        if ($seller) {
            $query = $query
                ->join('restaurant_foods', 'restaurant_foods.id', '=', 'restaurant_food_translations.restaurant_food_id')
                ->join('sellers', 'sellers.id', '=', 'restaurant_foods.seller_id')
                ->where('sellers.id', $seller->id)
                ->select('restaurant_food_translations.*');
        }
        return $query;
    }
    // Created by sushil sir for seller

    
}
