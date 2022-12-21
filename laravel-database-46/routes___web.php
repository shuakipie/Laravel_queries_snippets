<?php

use App\City;
use App\Room;
use App\User;
use App\Image;
use App\Address;
use App\Comment;
use App\Company;
use App\Reservation;
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

    
    // $result = DB::table('comments')
    // ->selectRaw('count(rating) as rating_count, rating') // and other aggregate functions like avg, sum, max, min, etc.
    // ->groupBy('rating')
    // ->orderBy('rating_count', 'desc')
    // ->get();

    // $result = DB::table('rooms')
    // ->orderByRaw('sqrt(room_number)')
    // ->get();

    // $result = DB::table('comments')
    // ->select('content')
    // ->selectRaw('CASE WHEN rating = 5 THEN "Very good" WHEN rating = 1 THEN "Very bad" ELSE "ok" END as text_rating')
    // ->get();

    // $result = Reservation::select('*')
    //         ->selectRaw('DATEDIFF(check_out, check_in) as nights')
    //         ->orderBy('nights', 'DESC')
    //         ->get();

    $additional_fee = 10;
    $result = Room::selectRaw("room_size, room_number, price + $additional_fee as final_price")->get();
            

    dump($result);


    return view('welcome');
});
