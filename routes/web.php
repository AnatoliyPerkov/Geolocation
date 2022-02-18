<?php

use App\Http\Controllers\Geolocation\Home;
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
Route::get('/', [Home::class,'index'])->name('home');
Route::post('/create', [Home::class,'locationCreate'])->name('home.locationCreate');
Route::get('/locations', [Home::class,'getAllLocations'])->name('home.locations');
Route::get('/addresses', [Home::class,'getStateAddresses'])->name('home.state.addresses');




