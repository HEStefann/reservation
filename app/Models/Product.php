<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Menu::class)->with('restaurant');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

}
