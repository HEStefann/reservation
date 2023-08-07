<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantImageController;
use App\Http\Controllers\RestaurantSettingsCalendarController;
use App\Http\Controllers\RestaurantSettingsController;
use App\Http\Controllers\RestaurantTagsController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    // Restaurant registration routes
    Route::get('/restaurant/register', [RestaurantController::class, 'create'])->name('restaurant.register'); // routes/web.php
    Route::post('/restaurant/register', [RestaurantController::class, 'store']);

    // Restaurant settings routes
    Route::prefix('/restaurant/{restaurant}')->name('restaurant.settings.')->group(function () {
        Route::get('/settings', [RestaurantSettingsController::class, 'index'])->name('index');
        Route::post('/update-info', [RestaurantSettingsController::class, 'updateInfo'])->name('update_info');
        Route::post('/update-available-people', [RestaurantSettingsController::class, 'updateAvailablePeople'])->name('update_available_people');
        Route::post('/update-operating-hours', [RestaurantSettingsController::class, 'updateOperatingHours'])->name('update_operating_hours');
        Route::post('/update-operating-status', [RestaurantSettingsController::class, 'updateOperatingStatus'])->name('update_operating_status');
        Route::post('/update-content', [RestaurantSettingsController::class, 'updateContent'])->name('update_content');
    });

    Route::get('/restaurant/{restaurant}/images', [RestaurantImageController::class, 'index']);
    Route::post('/restaurant/{restaurant}/images', [RestaurantImageController::class, 'upload'])->name('restaurant.image.upload');

    Route::resource('tags', TagsController::class);
    Route::post('/restaurant/{restaurant}/tags', [RestaurantTagsController::class, 'update'])->name('restaurant.tags.update');

    // Calendar routes
    Route::get('/calendar/{date?}', [RestaurantSettingsCalendarController::class, 'calendar']);

    // Working hours routes
    Route::prefix('/restaurant/{restaurant}/working-hours')->name('restaurant.working-hours.')->group(function () {
        Route::get('/{date}', [RestaurantSettingsCalendarController::class, 'getWorkingHoursForDate'])->name('get');
        Route::put('/', [RestaurantSettingsCalendarController::class, 'updateWorkingHours'])->name('update');
    });
});



    // Route::get('/restaurant/{restaurant}/settings', [RestaurantSettingsController::class, 'index'])->name('restaurant.settings.index');

    // Route::post('/restaurant/{restaurant}/working-hours/update', [RestaurantController::class, 'updateWorkingHours'])
    // ->name('restaurant.working-hours.update'); 

    // // Restaurant image route
    // Route::post('/restaurant/{restaurant}/upload-image', [RestaurantImageController::class, 'upload'])->name('restaurant.image.upload');

    // // Restaurant tag route
    // Route::post('/restaurant/{restaurant}/update-tags', [RestaurantSettingsController::class, 'updateTags'])->name('restaurant.tags.update');

    // // Calendar routes
    // Route::get('/calendar/{date?}', [RestaurantSettingsCalendarController::class, 'calendar']);
    // Route::get('/calendar', [CalendarController::class, 'index']);
    // Route::post('/calendar/update-day', [CalendarController::class, 'updateDay']);