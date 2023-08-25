<?php
// web.php

use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminRestaurantController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantImageController;
use App\Http\Controllers\RestaurantSettingsCalendarController;
use App\Http\Controllers\RestaurantSettingsController;
use App\Http\Controllers\RestaurantTagsController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
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

Route::middleware(['auth', 'ModeratorOrOwnerRole'])->group(function () {
    Route::get('/restaurant/register', [RestaurantController::class, 'create'])->name('restaurant.register');
    Route::post('/restaurant/register', [RestaurantController::class, 'store']);

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
        Route::post('/images', [RestaurantImageController::class, 'upload'])->name('image.upload');

        // Restaurant tags route
        Route::post('/tags', [RestaurantTagsController::class, 'update'])->name('tags.update');
    });

    Route::resource('tags', TagsController::class);

    Route::get('/calendar/{date?}', [RestaurantSettingsCalendarController::class, 'calendar']);
    Route::prefix('/restaurant/{restaurant}/working-hours')->name('restaurant.working-hours.')->group(function () {
        Route::get('/{date}', [RestaurantSettingsCalendarController::class, 'getWorkingHoursForDate'])->name('get');
        Route::put('/', [RestaurantSettingsCalendarController::class, 'updateWorkingHours'])->name('update');
    });
    Route::get('/dashboard', [ReservationController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/user/restaurants', [UserController::class, 'index'])->name('restaurants.index');
    Route::get('/history', [ReservationController::class, 'history'])->name('history');

    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit2'])->name('reservations.edit');
    Route::put('/reservations/{reservation}/update2', [ReservationController::class, 'update2'])->name('reservations.update2');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::put('/reservations/{reservation}/status', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');
    // reservation store
    // Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/restaurant/{restaurant}/promotions/create', [PromotionController::class, 'create'])->name('promotions.create');
    Route::post('/restaurant/{restaurant}/promotions', [PromotionController::class, 'store'])->name('promotions.store');
    Route::get('/restaurant/{restaurant}/promotions/{promotion}/edit', [PromotionController::class, 'edit'])->name('promotions.edit');
    Route::put('/restaurant/{restaurant}/promotions/{promotion}', [PromotionController::class, 'update'])->name('promotions.update');
    Route::delete('/restaurant/{restaurant}/promotions/{promotion}', [PromotionController::class, 'destroy'])->name('promotions.destroy');
});
// Ovie ruti se koristeni i od restorani i od korisnici
Route::post('/restaurant/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
Route::middleware(['auth', 'GuestRole'])->group(function () {
    // Route::get('/testing', [UserController::class, 'index'])->name('user.home');
    Route::get('/restaurant/register', [RestaurantController::class, 'create'])->name('restaurant.register');
    Route::post('/restaurant/register', [RestaurantController::class, 'store']);
    Route::get('/user/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('user.restaurants.show');
});
Route::post('/getNearestRestaurants', [RestaurantController::class, 'getNearestRestaurants']);
Route::post('/user/favorite/{restaurant}', [UserController::class, 'favorite'])->name('user.favorite');
Route::get('/reservations', [ReservationController::class, 'userReservations'])->name('reservations.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/testing', [UserController::class, 'index'])->name('user.home');
Route::get('/testing2', [UserController::class, 'page2'])->name('user.restaurantspage');
Route::get('/testing3/{restaurant}', function ($restaurant) {
    return view('user.restaurant', ['restaurant' => $restaurant]);
})->name('user.restaurant');
Route::get('/testing3/{restaurant}', [RestaurantController::class, 'show'])->name('user.restaurant');
// For admin restaurant controller crud for /restaurant
// Show all restaurants
Route::get('/restaurants', [AdminRestaurantController::class, 'index'])->name('admin.restaurants.index');

// Show form to create a new restaurant  
Route::get('/restaurants/create', [AdminRestaurantController::class, 'create'])->name('admin.restaurants.create');

// Store new restaurant
Route::post('/restaurants', [AdminRestaurantController::class, 'store'])->name('admin.restaurants.store');

// Show single restaurant
Route::get('/restaurants/{restaurant}', [AdminRestaurantController::class, 'show'])->name('admin.restaurants.show');

// Show form to edit restaurant
Route::get('/restaurants/{restaurant}/edit', [AdminRestaurantController::class, 'edit'])->name('admin.restaurants.edit');

// Update restaurant
Route::put('/restaurants/{restaurant}', [AdminRestaurantController::class, 'update'])->name('admin.restaurants.update');

// Delete restaurant
Route::delete('/restaurants/{restaurant}', [AdminRestaurantController::class, 'destroy'])->name('admin.restaurants.destroy');

Route::get('/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
Route::get('/reservations/{reservation}', [AdminReservationController::class, 'show'])->name('admin.reservations.show');
Route::put('/reservations/{reservation}/update', [AdminReservationController::class, 'update'])->name('admin.reservations.update');
Route::get('/reservations/{reservation}/edit', [AdminReservationController::class, 'edit'])->name('admin.reservations.edit');
Route::post('/reservations', [AdminReservationController::class, 'store'])->name('admin.reservations.store');
Route::delete('/reservations/{reservation}', [AdminReservationController::class, 'destroy'])->name('admin.reservations.destroy');
Route::put('/reservations/{reservation}', [AdminReservationController::class, 'restore'])->name('admin.reservations.restore');

// route for admin user view
Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
