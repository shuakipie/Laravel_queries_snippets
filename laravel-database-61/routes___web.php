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

    $item_id = 2;

    // $result  = Post::with('comments')->find($item_id);
    // $result  = Tag::with(['posts' => function($q){
    //     $q->select('posts.id', 'posts.title');
    // }])->find($item_id);
    $result  = Category::with(['posts' => function($q){
        $q->select('posts.id', 'posts.title', 'posts.category_id');
    }])->find($item_id);

    dump($result);

    return view('welcome');
});
