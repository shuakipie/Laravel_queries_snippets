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

    // $user_id = 1;
    // $category_id = 1;
    
    // $post = new Post;
    // $post->title = 'post_title';
    // $post->content = 'post_content';
    // $post->category()->associate($category_id);
    
    // $result = User::find($user_id)->posts()->save($post);
    
    
    // $post_id = 1;
    // $comment = new Comment;
    // $comment->content = 'comment content';
    // $comment->post()->associate($post_id);
    // $result = $comment->save();
    
    $post = Post::find(1);
    // $post->title = 'updated title';
    // $result = $post->save();
    $result = $post->delete();
    
    dump($result);

    return view('welcome');
});
