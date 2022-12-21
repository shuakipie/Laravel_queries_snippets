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

    $post = Post::find(40);
    // $post->tags()->attach(1);
    // $post->category()->associate(1);
    // $post->category()->dissociate();
    $post->tags()->detach();
    $result = $post->save();
    
    dump($result);

    return view('welcome');
});
