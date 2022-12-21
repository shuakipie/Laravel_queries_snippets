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

    // $result = User::find(1)->comments()
    //             ->where('rating', '>', 3)
    //             ->orWhere('rating', '<', 2)
    //             ->get();
    // $result = User::find(1)->comments()
    //             ->where(function($query){
    //                 return $query->where('rating', '>', 3)
    //                         ->orWhere('rating', '<', 2);
    //             })
    //             ->get();

    // $result = App\User::has('comments', '>=', 6)->get();
    // $result = App\Comment::has('user.address')->get();


    // $result = App\User::whereHas('comments', function ($query) {
    //     $query->where('rating', '>', 2);
    // }, '>=', 2)->get();

    // $result = App\User::doesntHave('comments')->get(); // ->orDoesntHave

    // $result = App\User::whereDoesntHave('comments', function ($query) {
    //     $query->where('rating', '<', 2);
    // })->get(); // ->orWhereDoesntHave

    // $result = App\Reservation::whereDoesntHave('user.comments', function ($query) {
    //     $query->where('rating', '<', 2);
    // })->get(); // more realistic scenario: give me all posts written by users who rated by at lest 3 stars

    // $result = App\User::withCount('comments')->get();

    $result = App\User::withCount([
        'comments',
        'comments as negative_comments_count' => function ($query) {
            $query->where('rating', '<=', 2);
        },
    ])->get();
          
    dump($result[0]->comments_count,$result[0]->negative_comments_count);

    return view('welcome');
});
