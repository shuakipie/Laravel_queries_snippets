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

    // $result = User::all();
    // $result = User::with(['address' => function($query){
    //     $query->where('street', 'like', '%Garden');
    // }])->get(); // ['address', 'otherRelation']

    // foreach($result as $user)
    // {
    //     echo "{$user->address->street} <br>";
    // }

    // $result = Reservation::with('user.address')->get();

    // foreach($result as $reservation)
    // {
    //     echo "{$reservation->user->address->street} <br>";
    // }

    // lazy-eager loading:
    // $result = User::all();
    // $result->load('address');  // address => function($query) {...}

    // eager loading nested polimorphic relations
    // $result = Image::with(['imageable' => function ($morphTo) {
    //     $morphTo->morphWith([
    //         User::class => ['likedImages']
    //     ]);
    // }])->get();


    // lazy-eager loading nested polimorphic relations
    $result = Image::with('imageable')
    ->get();
    $result->loadMorph('imageable', [User::class => ['likedImages']]);

    dump($result);


    return view('welcome');
});
