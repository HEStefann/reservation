<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'restaurant_tags', 'restaurant_id', 'tag_id');
    }

    public function workingHours(): HasMany
    {
        return $this->hasMany(WorkingHour::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, Menu::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function moderators(): HasMany
    {
        return $this->hasMany(Moderator::class);
    }
}
