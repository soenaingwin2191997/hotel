<?php

use App\Http\Controllers\Admin\DarkController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\HotelPhotoController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TownshipController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserHotelController;
use App\Http\Controllers\User\UserRoomController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

route::middleware(['admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    route::get('townships', [TownshipController::class, 'index']);
    route::post('townships', [TownshipController::class, 'create']);
    route::get('ajax/townships', [TownshipController::class, 'ajaxTownship']);
    route::post('townships/update', [TownshipController::class, 'update']);
    route::get('townships/delete/{id}', [TownshipController::class, 'delete']);

    route::get('hotels', [HotelController::class, 'index']);
    route::get('hotels/add', [HotelController::class, 'createPage']);
    route::post('hotels', [HotelController::class, 'create']);
    route::get('ajax/hotels', [HotelController::class, 'show']);
    route::get('hotels/update/{id}', [HotelController::class, 'updatePage']);
    route::post('hotels/update',[HotelController::class,'update']);
    route::get('hotels/delete/{id}',[HotelController::class,'delete']);

    route::post('hotels/photo',[HotelPhotoController::class,'create']);
    route::post('hotels/photo/update',[HotelPhotoController::class,'update']);
    route::get('hotels/photo/delete/{id}',[HotelPhotoController::class,'delete']);

    route::get('rooms', [RoomController::class, 'index']);
    route::get('ajax/rooms',[RoomController::class,'show']);
    route::get('rooms/add', [RoomController::class, 'createPage']);
    Route::post('rooms', [RoomController::class, 'create']);
    route::get('rooms/update/{id}',[RoomController::class,'updatePage']);
    route::post('rooms/update',[RoomController::class,'update']);
    route::get('rooms/delete/{id}',[RoomController::class,'delete']);

    Route::get('dark/{id}', [DarkController::class, 'dark']);
    Route::get('light/{id}', [DarkController::class, 'light']);

    route::get('reservations', [ReservationController::class, 'index']);
    route::get('ajax/reservations', [ReservationController::class, 'show']);
    route::get('reservations/search',[ReservationController::class,'search']);
    route::get('reservations/{action}/{id}',[ReservationController::class,'update']);

    route::get('guests', [GuestController::class, 'index']);
    route::get('ajax/guests', [GuestController::class, 'show']);
    route::get('guests/search',[GuestController::class,'search']);
});



route::get('/', [UserController::class, 'index']);
route::get('users/page', [UserController::class, 'index']);

route::get('users/hotel/detail/{id}', [UserHotelController::class, 'show']);

route::get('users/room/detail', [UserRoomController::class, 'show']);

route::get('users/hotel/search', [UserController::class, 'search']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
