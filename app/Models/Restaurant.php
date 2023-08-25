<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;

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
        'lat',
        'lng',
        'address',
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
        return $this->hasMany(RestaurantImage::class);
    }

    public function moderators(): HasMany
    {
        return $this->hasMany(Moderator::class);
    }
    public function updateInfo(array $data)
    {
        return $this->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);
    }

    // Method to update the available number of people
    public function updateAvailablePeople(int $availablePeople)
    {
        return $this->update([
            'available_people' => $availablePeople,
        ]);
    }

    // Method to update the operating status
    public function updateOperatingStatus(string $operatingStatus)
    {
        return $this->update([
            'operating_status' => $operatingStatus,
        ]);
    }

    // Method to update content information
    public function updateContent(array $data)
    {
        return $this->update([
            'content_title' => $data['content_title'],
            'short_description' => $data['short_description'],
        ]);
    }

    // Method to get the opening time for a specific day
    public function getOpeningTime($day)
    {
        $workingHour = $this->workingHours->where('work_day', $day)->first();
        return $workingHour ? $workingHour->opening_time : null;
    }

    // Method to get the closing time for a specific day
    public function getClosingTime($day)
    {
        $workingHour = $this->workingHours->where('work_day', $day)->first();
        return $workingHour ? $workingHour->closing_time : null;
    }

    // Method to convert time to 24-hour format
    private function convertTo24HourFormat($time)
    {
        return date('H:i', strtotime("2023-07-24 $time"));
    }

    // Method to handle working hours
    public function saveWorkingHours(array $workingHours)
    {
        foreach ($workingHours as $day => $dayData) {
            $openingTime = isset($dayData['opening_time']) ? $this->convertTo24HourFormat($dayData['opening_time']) : null;
            $closingTime = isset($dayData['closing_time']) ? $this->convertTo24HourFormat($dayData['closing_time']) : null;

            // Find the existing working hour for the current day (where default_working_time is true)
            $workingHour = $this->workingHours()->where('day_of_week', $day)->where('default_working_time', true)->first();

            if ($workingHour) {
                // Update the existing working hour
                $workingHour->update([
                    'opening_time' => $openingTime,
                    'closing_time' => $closingTime,
                ]);
            } else {
                // Create a new working hour entry if it doesn't exist
                WorkingHour::create([
                    'restaurant_id' => $this->id,
                    'day_of_week' => $day,
                    'opening_time' => $openingTime,
                    'closing_time' => $closingTime,
                    'default_working_time' => true,
                ]);
            }
        }
    }
    public function getDefaultWorkingHours()
    {
        return $this->workingHours()->where('default_working_time', true)->get();
    }

    public function updateOrCreateWorkingHoursForDate($date, $data)
    {
        $workDate = Carbon::parse($date);

        $data['work_date'] = $workDate;
        $data['day_of_week'] = $workDate->format('l');
        $data['is_working'] = $data['is_working'] ? 1 : 0;
        $data['available_people'] = $data['available_people'] ?? 0;

        $this->workingHours()->updateOrCreate(
            ['work_date' => $workDate],
            $data
        );
    }
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'user_favorite_restaurants');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
