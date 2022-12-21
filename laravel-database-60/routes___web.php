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

    $most_popular_category  = Category::select('id', 'title')
        ->withCount('comments')
        ->orderBy('comments_count', 'desc')
        ->take(1)->get();

    dump($most_popular_category);

    return view('welcome');
});
