<?php

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
    $tags =App\Tag::orderBy('id','decs')->paginate(3);
    $categories =App\Category::orderBy('id','decs')->paginate(4);
    $posts = App\Post::paginate(9);
    return view('welcome')->withPosts($posts)->withTags($tags)->withCategories($categories);
});

Auth::routes();

Route::get('/home', function () {
    $tags =App\Tag::orderBy('id','decs')->paginate(3);
    $categories =App\Category::orderBy('id','decs')->paginate(4);
    $posts = App\Post::paginate(9);
    return view('welcome')->withPosts($posts)->withTags($tags)->withCategories($categories);
});

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts','PostController');

Route::resource('category','CategoryController');

Route::resource('tags','TagController');

Route::post('search','SearchController@search')->name('search');

Route::post('comment/create/{post}','CommentController@createComment')->name('createComment.store');

