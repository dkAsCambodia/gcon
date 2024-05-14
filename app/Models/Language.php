<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Language extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function scopeActive(Builder $query): void
    {
        $query->where('status', true);
    }
}
