<?php

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

    $result = DB::table('users')->orderByDesc(
        DB::table('reservations')
            ->select('price')
            ->whereColumn('users.id', 'reservations.user_id')
            ->orderByDesc('price')
            ->limit(1)
    )->get();
 
    dump($result);
    
    return view('welcome');
});

