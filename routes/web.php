<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;


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



Route::get('/', [Home::class, 'index'])->name('home');
Route::get('flights/', [Home::class, 'getFlights'])->name('flights');
Route::get('flights-new/', [Home::class, 'getFlights1'])->name('flights');
Route::post('submit-flight/', [Home::class, 'submit']);


