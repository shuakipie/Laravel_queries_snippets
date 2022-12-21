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

    
    // $result = User::with('comments')->get();

    // $result = DB::table('users')->join('comments', 'users.id', '=', 'comments.user_id')->get();

    $result = DB::select('select * from `users` inner join `comments` on `users`.`id` = `comments`.`user_id`');

    // $result = DB::statement('DROP TABLE addresses');
    // $result = DB::statement('ALTER TABLE rooms ADD INDEX index_name (price)');

    dump($result);


    return view('welcome');
});
