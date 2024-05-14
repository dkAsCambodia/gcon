<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TableCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $relationsToCascade = ['translations'];
    public function translations(): HasMany
    {
        return $this->hasMany(TableCategoryTranslation::class);
    }

    public function translationValuecat(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->translations()
                    ->where(['language_id' => Language::where('code', app()->getLocale())->first()?->id ?? 'en'])->get()->first();
            }
        );
    }

    public function catgbookingData()
    {
        return $this->belongsTo(TblGbooking::class,  'GBooking_id', 'id');
    }
}
