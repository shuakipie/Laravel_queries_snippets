<?php


use App\Tag;
use App\Post;
use App\User;
use App\Comment;
use App\Category;
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

    $search_term = 'Voluptatibus';

    // $result = DB::table('posts')
    //             ->where('title', 'like', "%$search_term%")
    //             ->orWhere('content', 'like', "%$search_term%")
    //             // ->get()
    //             ->paginate(10);

    $result = DB::table('posts')
                ->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$search_term])
                ->paginate(10);


    dump($result);

    return view('welcome');
});
