<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'PositionLeft',
        'PositionTop',
        'IdFloor',
        'Shape',
        'Active',
        'Reserved',
        'Lock',
        'Capacity',
        'TableDescription',
        'TableShortDescription',
        'Height',
        'Width',
        'CreatedBy',
    ];
    
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }
    
    public function floor()
    {
        return $this->belongsTo(Floor::class, 'IdFloor');
    }
}
