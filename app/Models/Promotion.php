<?php

// app/Models/Promotion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Promotion extends Model
{
    protected $fillable = ['restaurant_id', 'title', 'description', 'image'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
