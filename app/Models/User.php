<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phoneNumber',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin' && $this->role == 'admin') {
            return true;
        } else if ($panel->getId() === 'seller' && $this->role == 'seller') {
            $seller = Seller::where('sellerLoginId', $this->id)->first();
            return $seller?->status == true && $seller?->contractStatus == 'approved';

        } else if ($panel->getId() === 'deliveryBoy' && $this->role == 'deliveryBoy') {
            $deliveryboy = DeliveryBoy::where('DeleveryBoyLoginId', $this->id)->first();
            return $deliveryboy?->status == true;
        }
        return false;
    }
}
