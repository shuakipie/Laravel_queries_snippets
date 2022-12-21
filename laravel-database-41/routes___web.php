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

    // $result = App\Comment::whereHasMorph(
    //     'commentable',
    //     ['App\Image', 'App\Room'],
    //     function ($query, $type) {

    //         if ($type === 'App\Room')
    //         {
    //             $query->where('room_size', '>', 2);
    //             $query->orWhere('room_size', '<', 2);
    //         }
    //         if ($type === 'App\Image')
    //         {
    //             $query->where('path', 'like', '%lorem%');
    //         }

    //     }
    // )->get();

    // $result = Comment::with(['commentable' => function ($morphTo) {
    //     $morphTo->morphWithCount([
    //         Room::class => ['comments'],
    //         Image::class => ['comments'],
    //     ]);
    // }])->find(3);

    $result = Comment::find(3)
    ->loadMorphCount('commentable', [
        Room::class => ['comments'],
        Image::class => ['comments'],
    ]);

    dump($result);

    return view('welcome');
});
