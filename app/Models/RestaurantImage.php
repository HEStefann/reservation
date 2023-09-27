<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantImage extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['restaurant_id', 'image_url', 'display_order'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
