<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurantSettingsCalendarController;
use App\Http\Controllers\RestaurantSettingsController;
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

require __DIR__.'/auth.php';


Route::group(['middleware' => 'auth'], function () {
    Route::get('/restaurant/register', [RestaurantController::class, 'create'])->name('restaurant.register');
    Route::post('/restaurant/register', [RestaurantController::class, 'store']);
    Route::get('/restaurant/{restaurant}/settings', [RestaurantSettingsController::class, 'index'])->name('restaurant.settings');
    Route::post('/restaurant/{restaurant}/update-info', [RestaurantSettingsController::class, 'updateInfo'])->name('restaurant.settings.update_info');
    Route::post('/restaurant/{restaurant}/update-available-people', [RestaurantSettingsController::class, 'updateAvailablePeople'])->name('restaurant.settings.update_available_people');
    Route::post('/restaurant/{restaurant}/update-operating-hours', [RestaurantSettingsController::class, 'updateOperatingHours'])->name('restaurant.settings.update_operating_hours');
    Route::post('/restaurant/{restaurant}/update-operating-status', [RestaurantSettingsController::class, 'updateOperatingStatus'])->name('restaurant.settings.update_operating_status');
    Route::post('/restaurant/{restaurant}/update-content', [RestaurantSettingsController::class, 'updateContent'])->name('restaurant.settings.update_content');
    Route::get('/calendar/{date?}', [RestaurantSettingsCalendarController::class, 'calendar']);
});
