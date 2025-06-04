<?php

use App\Http\Controllers\Web\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', fn () => view('web.pages.landing.index'));

Route::get('home', [Home\HomeController::class, 'index'])->middleware(['auth', 'verified', 'password.confirm'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('reservations/create', [\App\Http\Controllers\Web\Reservation\ReservationController::class, 'create'])->name('reservations.create');
    Route::post('reservations', [\App\Http\Controllers\Web\Reservation\ReservationController::class, 'store'])->name('reservations.store');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('', [\App\Http\Controllers\Web\Admin\AdminController::class, 'index'])->name('index');
        Route::post('rooms/{room}/toggle', [\App\Http\Controllers\Web\Admin\AdminController::class, 'toggleRoom'])->name('rooms.toggle');
        Route::post('reservations/{reservation}/cancel', [\App\Http\Controllers\Web\Admin\AdminController::class, 'cancelReservation'])->name('reservations.cancel');
    });
});
