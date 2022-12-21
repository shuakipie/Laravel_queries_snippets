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

    // $user = User::find(1);
    // $result = $user->address()->delete();
    // $result = $user->address()->saveMany([   // save(new Address)
    //     new Address(['number' => 1, 'street' => 'street', 'country' => 'USA'])
    // ]);

    // $result = $user->address()->createMany([ // create()
    //     ['number' => 2, 'street' => 'street2', 'country' => 'Mexico']
    // ]);

    // $user = User::find(2);
    // $address = Address::find(2);
    // $address->user()->associate($user);
    // $result = $address->save();

    // $address->user()->dissociate();
    // $result = $address->save();

    // $room = Room::find(1);
    // $result = $room->cities()->attach(1);
    // $result = $room->cities()->detach([1]); // without argument all cities will be detached

    $comment = Comment::find(1);
    $comment->content = 'Edit to this comment!';
    $result = $comment->save();

    dump($result);

    return view('welcome');
});
