<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class RestaurantFood extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'restaurant_foods';

    protected $relationsToCascade = ['translations'];
    public function translations(): HasMany
    {
        return $this->hasMany(RestaurantFoodTranslation::class);
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

    public function getRestaurantCategory()
    {
        return $this->belongsTo(RestaurantCategory::class, 'restaurant_cat_id', 'id');
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

    public function getcurrencyData()
    {
        return $this->belongsTo(Currency::class,  'currency_id', 'id');
    }
}
