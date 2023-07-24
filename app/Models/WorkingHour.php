<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkingHour extends Model
{
    use HasFactory, SoftDeletes;
    
protected $fillable = [
    'restaurant_id',
    'work_date',
    'opening_time',
    'closing_time',
    'default_working_time',
];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}

