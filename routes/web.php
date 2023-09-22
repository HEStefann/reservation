<?php
// web.php

use App\Http\Controllers\AdminModeratorsController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminRestaurantController;
use App\Http\Controllers\AdminReviewController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PaymentController;
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
use App\Http\Controllers\Restaurant\RestaurantCalendarController;
use App\Http\Controllers\Restaurant\RestaurantReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\UserRestaurantsController;

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
Route::get('/', [UserController::class, 'index'])->name('user.home');
Route::get('/search', [UserController::class, 'search'])->name('user.restaurantspage');


Route::get('/dashboard', [RestaurantController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'ModeratorOrOwnerRole'])->group(function () {
    Route::get('/restaurant/register', [RestaurantController::class, 'create'])->name('restaurant.register');
    Route::post('/restaurant/register', [RestaurantController::class, 'store']);

    Route::prefix('/restaurant/{restaurant}')->name('restaurant.settings.')->group(function () {
        // Route::get('/settings', [RestaurantSettingsController::class, 'index'])->name('index');
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

    // Route::get('/calendar/{date?}', [RestaurantSettingsCalendarController::class, 'calendar']);
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
Route::get('/user/favorite/{restaurant}', [UserController::class, 'addFavorite'])->name('user.addFavorite');
// Route::get('/reservations', [ReservationController::class, 'userReservations'])->name('reservations.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
// Route::get('/testing3/{restaurant}', function ($restaurant) {
//     return view('user.restaurant', ['restaurant' => $restaurant]);
// })->name('user.restaurant');
Route::get('/restaurant/{restaurant}', [RestaurantController::class, 'show'])->name('user.restaurant');
Route::get('/search-restaurants', [UserRestaurantsController::class, 'searchRestaurants'])->name('search.restaurants');
Route::get('/restaurants', [AdminRestaurantController::class, 'index'])->name('admin.restaurants.index');
Route::get('/restaurants/create', [AdminRestaurantController::class, 'create'])->name('admin.restaurants.create');
Route::post('/restaurants', [AdminRestaurantController::class, 'store'])->name('admin.restaurants.store');
Route::get('/restaurants/{restaurant}', [AdminRestaurantController::class, 'show'])->name('admin.restaurants.show');
Route::get('/restaurants/{restaurant}/edit', [AdminRestaurantController::class, 'edit'])->name('admin.restaurants.edit');
Route::put('/restaurants/{restaurant}', [AdminRestaurantController::class, 'update'])->name('admin.restaurants.update');
Route::delete('/restaurants/{restaurant}', [AdminRestaurantController::class, 'destroy'])->name('admin.restaurants.destroy');
// Route::get('/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
Route::get('/reservations/{reservation}', [AdminReservationController::class, 'show'])->name('admin.reservations.show');
Route::put('/reservations/{reservation}/update', [AdminReservationController::class, 'update'])->name('admin.reservations.update');
Route::get('/reservations/{reservation}/edit', [AdminReservationController::class, 'edit'])->name('admin.reservations.edit');
Route::post('/reservations', [AdminReservationController::class, 'store'])->name('admin.reservations.store');
Route::delete('/reservations/{reservation}', [AdminReservationController::class, 'destroy'])->name('admin.reservations.destroy');
Route::put('/reservations/{reservation}', [AdminReservationController::class, 'restore'])->name('admin.reservations.restore');
Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
Route::get('/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
Route::get('/reviews/{review}', [AdminReviewController::class, 'show'])->name('admin.reviews.show');
Route::get('/reviews/{review}/edit', [AdminReviewController::class, 'edit'])->name('admin.reviews.edit');
Route::put('/reviews/{review}', [AdminReviewController::class, 'update'])->name('admin.reviews.update');
Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');
Route::put('/reviews/{review}', [AdminReviewController::class, 'restore'])->name('admin.reviews.restore');
Route::get('/moderators', [AdminModeratorsController::class, 'index'])->name('admin.moderators.index');
Route::get('/moderators/{moderator}', [AdminModeratorsController::class, 'show'])->name('admin.moderators.show');
Route::get('/moderators/create', [AdminModeratorsController::class, 'create'])->name('admin.moderators.create');
Route::put('/reviews/{review}', [AdminModeratorsController::class, 'edit'])->name('admin.moderators.edit');
Route::delete('/moderators/{moderator}', [AdminModeratorsController::class, 'destroy'])->name('admin.moderators.destroy');
Route::put('/moderators/{moderator}', [AdminModeratorsController::class, 'update'])->name('admin.moderators.update');
Route::post('/moderators', [AdminModeratorsController::class, 'store'])->name('admin.moderators.store');

// ova e napraven dizajn za restaurant login
Route::get('/loginviewrestaurant', function () {
    return view('restaurant.loginpage');
});

Route::get('/userprofile', [UserController::class, 'show'])->name('user.profile');
Route::get('/reservation/{restaurantId}', [UserReservationController::class, 'index'])->name('user.reservation');
Route::post('/reservation', [UserReservationController::class, 'store'])->name('user.reservation.store');

// ova e napraven dizajn za forgot password
Route::get('/forgotpassword', function () {
    return view('forgotpassword');
});

// ova e napraven dizajn za reset password
Route::get('/resetpassword', function () {
    return view('resetpassword');
});

// ova e narpaven dizajn za edit personal info

Route::get('/editpersonalinfo', [UserController::class, 'edit'])->name('editpersonalinfo');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

Route::get('/userfavourites', [UserController::class, 'favourites'])->name('userfavourites');
Route::get('/userreservations', [UserController::class, 'reservations'])->name('user.reservations');

// run factorys route in user controller

Route::get('/runfactorys', [UserController::class, 'runfactorys'])->name('runfactorys');


Route::get('/highly-rated-restaura`nts', [UserController::class, 'highlyrated'])->name('user.highlyrated');

Route::get('/recommended-restaurants', [UserController::class, 'recommended'])->name('user.recommended');
Route::get('/nearest-restaurants', [UserController::class, 'nearest'])->name('user.nearest');

Route::get('/payment/{reservation}', [PaymentController::class, 'index'])->name('payment.index');

Route::get('/searchByTag/{tag}', [RestaurantController::class, 'searchByTag'])->name('searchByTag');

Route::get('/reservations', [RestaurantReservationController::class, 'index'])->name('restaurant.reservations');
Route::put('/restaurant/reservation/accept/{reservation}', [RestaurantReservationController::class, 'accept'])->name('restaurant.reservation.accept');
Route::put('/restaurant/reservation/decline/{reservation}', [RestaurantReservationController::class, 'decline'])->name('restaurant.reservation.decline');
Route::get('/settings', [RestaurantSettingsController::class, 'index'])->name('restaurant.settings');
Route::get('/calendar', [RestaurantCalendarController::class, 'index'])->name('restaurant.calendar');
// floor plan
Route::get('/floor-plan', [RestaurantSettingsController::class, 'floorPlan'])->name('restaurant.floor-plan');
Route::put('/settings/update', [RestaurantSettingsController::class, 'update'])->name('restaurant.settings.update');
// updateTablePosition
Route::put('/settings/updateTablePosition', [RestaurantSettingsController::class, 'updateTablePosition'])->name('restaurant.settings.updateTablePosition');
