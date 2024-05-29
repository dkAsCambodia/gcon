<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    protected $relationsToCascade = ['translations'];
    public function translations(): HasMany
    {
        return $this->hasMany(RestaurantTranslation::class);
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
        return $this->belongsTo(Seller::class,  'sellerId', 'id');
    }

    public function gbookingdata()
    {
        return $this->belongsTo(TblGbooking::class,  'GBookingId', 'id');
    }
}
