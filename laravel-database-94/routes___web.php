<?php

use App\City;
use App\Room;
use App\Hotel;
use App\RoomType;
use App\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Console\Migrations\ResetCommand;

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

Route::get('/', function () {

    $city = City::find(1);
    
    $hotel = new Hotel;
    $hotel->name = 'hotel name';
    $hotel->description = 'hotel description';
    $hotel->city()->associate($city);
    $result = $hotel->save();
 
    dump($result);
    
    return view('welcome');
});

