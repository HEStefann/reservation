<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'restaurant_id',
        'user_id',
        'full_name',
        'phone_number',
        'email',
        'deposit',
        'date',
        'time',
        'number_of_people',
        'note',
        'status'
    ];



    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class, 'reservation_id');
    }

    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('restaurant.calendar', compact('reservation'));
    }
}
