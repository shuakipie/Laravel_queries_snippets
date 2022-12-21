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

    // $sortBy = 'created_at';
    // $sortBy = 'updated_at';
    $sortBy = 'updated_at desc, title asc';

    $result = DB::table('posts')
                ->whereRaw("MATCH(title, content) AGAINST(? IN BOOLEAN MODE)", [$search_term])
                ->when($sortBy, function($q, $sortBy){
                    // return $q->orderBy($sortBy);
                    return $q->orderByRaw($sortBy);
                }, function($q){
                    return $q->orderBy('title');
                })
                // ->paginate(10);
                ->simplePaginate(10); // only prev, next links

    dump($result);

    return view('welcome');
});
