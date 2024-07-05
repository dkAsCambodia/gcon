<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class RestaurantCategoryTranslation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function languages()
    {
        return $this->belongsTo(Language::class,  'language_id', 'id');
    }

    public function RestaurantCategoryData()
    {
        return $this->belongsTo(RestaurantCategory::class, 'restaurant_category_id', 'id');
    }

    // Created by sushil sir for seller
    public function scopeOwner(Builder $query)
    {
        $seller = Seller::where('sellerLoginId', auth()->id())->first();
        if ($seller) {
            $query = $query
                ->join('restaurant_categories', 'restaurant_categories.id', '=', 'restaurant_category_translations.restaurant_category_id')
                ->join('sellers', 'sellers.id', '=', 'restaurant_categories.seller_id')
                ->where('sellers.id', $seller->id)
                ->select('restaurant_category_translations.*');
        }
        return $query;
    }
    // Created by sushil sir for seller

}
