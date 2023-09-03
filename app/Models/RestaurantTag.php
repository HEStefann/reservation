<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantTag extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
