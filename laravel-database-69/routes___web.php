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

    $sortBy = 'created_at';
    $sortByMostCommented = true;
    $filterByUserId = 0;
    $filterByHighRating = false;

    $result = DB::table('posts')
                ->select('id', 'title')
                ->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$search_term]);
                
    $result->when($sortBy, function($q, $sortBy){
                    // return $q->orderBy($sortBy);
                    return $q->orderByRaw($sortBy);
                }, function($q){
                    return $q->orderBy('title');
                });
                
    $result->when($sortByMostCommented, function($q){
        return $q->orderByDesc(
            DB::table('comments')
            ->selectRaw('count(comments.post_id)')
            ->whereColumn('comments.post_id','posts.id')
            ->orderByRaw('count(comments.post_id) DESC')
            ->limit(1)
        );
    });
    
    $result->when($filterByUserId, function($q, $filterByUserId) {
        return $q->where('user_id', $filterByUserId);
    });
    
    $result->when($filterByHighRating, function($q){
        return $q->whereExists(function($query){
            return $query->select('*')
                     ->from('comments')
                     ->whereColumn('comments.post_id', 'posts.id')
                     ->where('comments.content', 'like', '%excellent%')
                     ->limit(1);
        });
    });
    
    $result = $result->paginate(10);

    dump($result);

    return view('welcome');
});
