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
    return view('index', [
        'articles' => App\Article::take(2)->latest()->get()
    ]);
});

Route::get('test', function () {
    return view('test', [
        'name' => request('name')
    ]);
});

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

Route::get('/translate', 'TranslateController@index');
Route::get('/text', 'TranslateController@translateText');

/*Route::get('/posts/{post}', function ($post) {
    $posts = [
        'my-post' => 'something',
        'next1' => 'hi',
    ];

    if(! array_key_exists($post, $posts)){
        abort(404,'Sorry, that post was not found.');
    }

    return view('post', [
//        'post' => $posts[$post] ?? 'Nothing here yet.',
        'post' => $posts[$post]
    ]);
});*/

Route::get('/show', function () {
    $now = new DateTime();
    $items = ["Fried Potatoes", "Boiled Potatoes", "Baked Potatoes"];
    return view('show-menu', ['when' => $now, 'what' => $items]);
});

Route::get('about', function () {
    return view('about', [
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
