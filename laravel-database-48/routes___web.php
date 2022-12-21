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
use Illuminate\Support\Facades\Redis;
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

    // strings
    // $result = Redis::set('key', 'value');
    // $result = Redis::get('key');
    // $result = Redis::del('key');
    // $result = Redis::exists('key');
    // $result = Redis::incr('counter'); // decr()

    // lists (like arrays)
    // Redis::lpush('data','lvalue');  // lpop, rpop
    // Redis::rpush('data','rvalue');
    // $result = Redis::llen('data');
    $result = Redis::lrange('data', 0, 2);

    dump($result);


    return view('welcome');
});
