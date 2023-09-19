<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    public function restaurant()
    {
        return $this->belongsToMany(Restaurant::class, 'floor_restaurant');
    }
}
