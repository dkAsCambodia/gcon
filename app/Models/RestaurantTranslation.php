<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    //Created by sushil sir for seller
    public function scopeOwner(Builder $query)
    {
        $seller = Seller::where('sellerLoginId', auth()->id())->first();
        if ($seller) {
            $query = $query
                ->join('restaurants', 'restaurants.id', '=', 'restaurant_translations.restaurant_id')
                ->join('sellers', 'sellers.id', '=', 'restaurants.sellerId')
                ->where('sellers.id', $seller->id)
                ->select('restaurant_translations.*');
        }
        return $query;
    }
    //Created by sushil sir for seller
}
