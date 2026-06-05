<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HotelController;

Route::get('/', [HotelController::class, 'index']);

Route::get('/hotel',[HotelController::class,'hotel']);

Route::get('/reserva', [HotelController::class, 'reserva']);

Route::post('/reserva', [HotelController::class, 'storeReserva']);

Route::get('/misreservas', [HotelController::class, 'misReservas']);