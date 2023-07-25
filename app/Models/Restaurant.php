<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;


class Restaurant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'available_people',
        'operating_status',
        'content_title',
        'short_description',
    ];
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

    // Define the methods to get the opening and closing times for each day
    public function getOpeningTime($day)
    {
        $workingHour = $this->workingHours->where('work_day', $day)->first();
        return $workingHour ? $workingHour->opening_time : null;
    }

    public function getClosingTime($day)
    {
        $workingHour = $this->workingHours->where('work_day', $day)->first();
        return $workingHour ? $workingHour->closing_time : null;
    }
    // Method to convert time to 24-hour format
    private function convertTo24HourFormat($time)
    {
        return date('H:i', strtotime("2023-07-24 $time")); // Use a specific date for proper conversion
    }





    // Method to handle working hours
    public function saveWorkingHours(array $workingHours)
    {
        foreach ($workingHours as $day => $dayData) {
            $openingTime = isset($dayData['opening_time']) ? $this->convertTo24HourFormat($dayData['opening_time']) : null;
            $closingTime = isset($dayData['closing_time']) ? $this->convertTo24HourFormat($dayData['closing_time']) : null;

            // Save working hours for each day
            if ($openingTime !== null && $closingTime !== null) {
                WorkingHour::create([
                    'restaurant_id' => $this->id,
                    'day_of_week' => $day, // Corrected to use $day instead of $dayData['day']
                    'opening_time' => $openingTime,
                    'closing_time' => $closingTime,
                    'default_working_time' => true,
                ]);
            }
        }
    }






    /**
     * Update the restaurant information.
     *
     * @param array $data
     * @return bool
     */
    public function updateRestaurantInfo(array $data)
    {
        return $this->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
    }

    /**
     * Update the available number of people for the restaurant.
     *
     * @param int $availablePeople
     * @return bool
     */
    public function updateAvailablePeople(int $availablePeople)
    {
        return $this->update([
            'available_people' => $availablePeople,
        ]);
    }

    /**
     * Update the operating status for the restaurant.
     *
     * @param string $operatingStatus
     * @return bool
     */
    public function updateOperatingStatus(string $operatingStatus)
    {
        return $this->update([
            'operating_status' => $operatingStatus,
        ]);
    }

    /**
     * Update the content information for the restaurant.
     *
     * @param array $data
     * @return bool
     */
    public function updateContent(array $data)
    {
        return $this->update([
            'content_title' => $data['content_title'],
            'short_description' => $data['short_description'],
        ]);
    }
    public function getDefaultWorkingHours()
    {
        return $this->workingHours()->where('default_working_time', true)->get();
    }
}
