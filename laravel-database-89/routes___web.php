<?php

use App\Room;
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

    $user_id = 1;
    
    $result = Reservation::with(['rooms.type', 'rooms.hotel'])
            ->where('user_id', $user_id)->get();
 
    dump($result);
    
    return view('welcome');
});

