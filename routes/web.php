<?php
// web.php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantImageController;
use App\Http\Controllers\RestaurantSettingsCalendarController;
use App\Http\Controllers\RestaurantSettingsController;
use App\Http\Controllers\RestaurantTagsController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', [RestaurantController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::middleware(['ModeratorRole', 'OwnerRole'])->group(function () {
    
        Route::prefix('/restaurant/{restaurant}')->name('restaurant.settings.')->group(function () {
            Route::get('/settings', [RestaurantSettingsController::class, 'index'])->name('index');
            Route::post('/update-info', [RestaurantSettingsController::class, 'updateInfo'])->name('update_info');
            Route::post('/update-available-people', [RestaurantSettingsController::class, 'updateAvailablePeople'])->name('update_available_people');
            Route::post('/update-operating-hours', [RestaurantSettingsController::class, 'updateOperatingHours'])->name('update_operating_hours');
            Route::post('/update-operating-status', [RestaurantSettingsController::class, 'updateOperatingStatus'])->name('update_operating_status');
            Route::post('/update-content', [RestaurantSettingsController::class, 'updateContent'])->name('update_content');
    
            // Working hours routes
            Route::prefix('/working-hours')->name('working-hours.')->group(function () {
                Route::get('/{date}', [RestaurantSettingsCalendarController::class, 'getWorkingHoursForDate'])->name('get');
                Route::put('/', [RestaurantSettingsCalendarController::class, 'updateWorkingHours'])->name('update');
            });
    
            // Restaurant images routes
            Route::get('/images', [RestaurantImageController::class, 'index']);
            Route::post('/images', [RestaurantImageController::class, 'upload'])->name('restaurant.image.upload');
    
            // Restaurant tags route
            Route::post('/tags', [RestaurantTagsController::class, 'update'])->name('restaurant.tags.update');
        });
    
        Route::resource('tags', TagsController::class);
    
        Route::get('/calendar/{date?}', [RestaurantSettingsCalendarController::class, 'calendar']);
        Route::prefix('/restaurant/{restaurant}/working-hours')->name('restaurant.working-hours.')->group(function () {
            Route::get('/{date}', [RestaurantSettingsCalendarController::class, 'getWorkingHoursForDate'])->name('get');
            Route::put('/', [RestaurantSettingsCalendarController::class, 'updateWorkingHours'])->name('update');
        });
        Route::get('/dashboard', [ReservationController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
        Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
        Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
        Route::get('/user/restaurants', [UserController::class, 'index'])->name('restaurants.index');
        Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
        Route::get('/reservations/update', [ReservationController::class, 'update'])->name('reservations.update');
        Route::get('/history', [ReservationController::class, 'history'])->name('history');
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::patch('/notifications/{notification}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    });
    Route::middleware(['GuestRole'])->group(function () {
        Route::get('/index', function () {
            return view('user.index');
        })->name('user.index');
        Route::get('/restaurant/register', [RestaurantController::class, 'create'])->name('restaurant.register');
        Route::post('/restaurant/register', [RestaurantController::class, 'store']);
    });
});
