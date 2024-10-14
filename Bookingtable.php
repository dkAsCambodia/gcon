<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Bookingtable extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $relationsToCascade = ['translations'];
    public function translations(): HasMany
    {
        return $this->hasMany(BookingtableTranslation::class);
    }

    public function concertTransactions()
    {
        return $this->hasMany(ConcertTransaction::class, 'tableId', 'id');
    }

    public function translationValue(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->translations()
                    ->where(['language_id' => Language::where('code', app()->getLocale())->first()?->id ?? 'en'])->get()->first();
            }
        );
    }

    public function categories()
    {
        return $this->belongsTo(TableCategoryTranslation::class,  'cat_id', 'table_category_id')->where('language_id', '1');
    }

    public function gbookingdata()
    {
        return $this->belongsTo(TblGbooking::class,  'GBooking_id', 'id');
    }

    public function currencydata()
    {
        return $this->belongsTo(Currency::class,  'currency', 'id');
    }

    

}
