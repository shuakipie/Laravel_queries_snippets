<?php

use App\City;
use App\Room;
use App\Hotel;
use App\Country;
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

    $result = Reservation::chunk(5, function ($reservations) {
        foreach ($reservations as $reservation)
        {
            foreach ($reservation->rooms()->get() as $room)
            {
                if(!$room->pivot->status)
                $reservation->delete();
            }
           
        }
    });
    
    dump($result);
    
    return view('welcome');
});

