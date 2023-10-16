<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'Description',
        'DisplayOrder',
        'Active',
        'CreatedBy'
    ];
    public function restaurant()
    {
        return $this->belongsToMany(Restaurant::class, 'floor_restaurant');
    }
}
