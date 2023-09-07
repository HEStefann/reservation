<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

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
    protected $dates = ['deleted_at'];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
      return $this->belongsToMany(Restaurant::class, 'user_favorite_restaurants'); 
    }

    public function favorite()
    {
        return $this->belongsToMany(Restaurant::class, 'user_favorite_restaurants');
    }
    public function addFavorite(Restaurant $restaurant)
    {
        // Add restaurant to user's favorites
        $this->favorites()->attach($restaurant->id);
    }

    public function unfavorite(Restaurant $restaurant)
    {
        // Remove restaurant from user's favorites
        $this->favorites()->detach($restaurant->id);
    }

    public function isFavorite(Restaurant $restaurant)
    {
        // Check if restaurant is in user's favorites
        return $this->favorites()->where('restaurant_id', $restaurant->id)->exists();
    }
}
