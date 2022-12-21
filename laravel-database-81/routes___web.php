<?php

use App\Room;
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
    
    $check_in = '2020-06-01';
    $check_out = '2020-06-09';

    // $result = DB::table('rooms')->join('room_types','rooms.room_type_id','=','room_types.id')
    // ->whereNotExists(function ($query) use ($check_in, $check_out) {
    //     $query->select('reservations.id')
    //             ->from('reservations')
    //             ->join('reservation_room', 'reservations.id', '=', 'reservation_room.reservation_id')
    //             ->whereRaw('rooms.id = reservation_room.room_id')
    //             ->where(function ($q) use ($check_in, $check_out) {
    //                     $q->where('check_out', '>', $check_in);
    //                     $q->where('check_in', '<', $check_out);
    //                 })
    //                 ->limit(1);
    // })
    // ->get();
    
    $result = Room::with('type')
        ->whereDoesntHave('reservations' , function($q) use ($check_in, $check_out) {
                    $q->where(function($q) use($check_in, $check_out) {
                        $q->where('check_out', '>', $check_in);
                        $q->where('check_in', '<', $check_out);
                });
            })
            ->get();

    
    
    dump($result);
    
    return view('welcome');
});

