<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RestaurantCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $relationsToCascade = ['translations'];
    public function translations(): HasMany
    {
        return $this->hasMany(RestaurantCategoryTranslation::class);
    }

    public function translationValue(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->translations()
                    ->where(['language_id' => Language::where('code', app()->getLocale())->first()?->id ?? 'en'])
                    ->get()->first();
            }
        );
    }

    public function getsellerData()
    {
        return $this->belongsTo(Seller::class,  'seller_id', 'id');
    }

    public function restaurantData()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    //Created by dk for seller
    public function scopeOwner(Builder $query)
    {
        $seller = Seller::where('sellerLoginId', auth()->id())->first();
        if($seller){
            $query = $query->where('seller_id', $seller->id);
        }
        return $query;
    }
    //Created by dk for seller
}
