<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableCategoryTranslation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function languages()
    {
        return $this->belongsTo(Language::class,  'language_id', 'id');
    }

    public function catdata()
    {
        return $this->belongsTo(TableCategory::class,  'table_category_id', 'id');
    }

    public function catgbookingData()
    {
        return 'dd';
    }
}
