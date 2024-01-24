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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')-> name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout','Auth\LoginController@logout');
Route::post('/logout','Auth\LoginController@logout');

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');
Route::post('/top','PostsController@postCreate');

Route::get('/profile','UsersController@profile')->middleware('auth');

//プロフィールの更新機能
Route::post('/profile','UsersController@updateProfile');

Route::get('/search','UsersController@userList')->middleware('auth');
Route::post('/search','UsersController@search');
//フォローリスト画面への遷移
Route::get('/follow-list','FollowsController@followList')->middleware('auth');
//フォロワーリスト画面への遷移
Route::get('/follower-list','FollowsController@followerList')->middleware('auth');

//postのdeleteメソッドを使用するためのルーティング
Route::get('/top/{id}/delete', 'PostsController@delete');

//postのupdateメソッドを使用するためのルーティング
Route::post('/top/update', 'PostsController@update');

//フォロー機能
Route::post('/search/{user}/follow', 'UsersController@follow');

//フォロー解除
Route::post('/search/{user}/unfollow', 'UsersController@unfollow');
