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

    $most_popular_posts  = Post::select('id', 'title')->orderByDesc(
                Comment::selectRaw('count(post_id) as comment_count')
                    ->whereColumn('posts.id', 'comments.post_id')
                    ->orderBy('comment_count','desc')
                    ->limit(1)
            )
            ->withCount('comments')->take(5)->get();

    $most_active_users = User::select('id','name')->orderByDesc(
                        Post::selectRaw('count(user_id) as post_count')
                        ->whereColumn('users.id', 'posts.user_id')
                        ->orderBy('post_count','desc')
                        ->limit(1)
                    )
                    ->withCount('posts')
                    ->take(3)
                    ->get();


    dump($most_popular_posts, $most_active_users);

    return view('welcome');
});
