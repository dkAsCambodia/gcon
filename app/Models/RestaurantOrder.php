<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    public function ShippingAddressData()
    {
        return $this->belongsTo(ShipAddresse::class,  'address_id', 'id');
    }

    public function deliveryBoydata()
    {
        return $this->belongsTo(DeliveryBoy::class,  'deliveryBoyId', 'id');
    }

    // Created by dk for seller and DeliveryBoy
    public function scopeOwner(Builder $query)
    {
        // for seller
        $seller = Seller::where('sellerLoginId', auth()->id())->first();
        if ($seller) {
            return $query->where('seller_id', $seller->id);
        }
        // for DeliveryBoy
        $deliveryBoy = DeliveryBoy::where('DeleveryBoyLoginId', auth()->id())->first();
        if ($deliveryBoy) {
            return $query->where('deliveryBoyId', $deliveryBoy->id);
        }

        return $query;
    }


}
