<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ReservationController as ReservationControllerAdmin;
use App\Http\Controllers\ReservationController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
        Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::post('/cars/store', [CarController::class, 'store'])->name('cars.store');
        Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');
        Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
        Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
        Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

        Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
        Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

        Route::get('/reservations', [ReservationControllerAdmin::class, 'index'])->name('reservations.index');
        Route::get('/reservations/create', [ReservationControllerAdmin::class, 'create'])->name('reservations.create');
        Route::post('/reservations/store', [ReservationControllerAdmin::class, 'store'])->name('reservations.store');
        Route::get('/reservations/{reservation}', [ReservationControllerAdmin::class, 'show'])->name('reservations.show');
        Route::get('/reservations/{reservation}/edit', [ReservationControllerAdmin::class, 'edit'])->name('reservations.edit');
        Route::put('/reservations/{reservation}', [ReservationControllerAdmin::class, 'update'])->name('reservations.update');
        Route::delete('/reservations/{reservation}', [ReservationControllerAdmin::class, 'destroy'])->name('reservations.destroy');
    });
});
