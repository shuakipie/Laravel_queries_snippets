<?php

use App\Address;
use App\City;
use App\Comment;
use App\Reservation;
use App\Room;
use App\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {

    // $result = City::find(1);
    $result = Room::where('room_size', 3)->get();

    // dump($result->rooms);
    // dump($result->cities);
    foreach($result as $rooms)
    {
        foreach($rooms->cities as $city)
        {
            // echo $city->name . '<br>';
            // echo $city->pivot->room_id . '<br>';
            dump($city->pivot->created_at);
        }
    }

    return view('welcome');
});
