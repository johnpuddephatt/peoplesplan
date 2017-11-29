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



Route::get('/blog/{slug}', 'ArticleController@show');

Route::group(
  [
    'prefix' => config('backpack.base.route_prefix'),
    'middleware' => 'isAdmin'
  ], function() {
  Route::get('dashboard', '\Backpack\Base\app\Http\Controllers\AdminController@dashboard')->name('backpack.dashboard');
  Route::get('/', '\Backpack\Base\app\Http\Controllers\AdminController@redirect')->name('backpack');
});

Route::group(
  [
    'namespace' => 'Admin',
    'prefix' => config('backpack.base.route_prefix'),
    'middleware' => 'isAdmin'
  ], function() {
  CRUD::resource('articles', 'ArticleCrudController');
  CRUD::resource('comments', 'CommentCrudController');
  CRUD::resource('users', 'UserCrudController');
});

Route::get('/blog/', 'ArticleController@index');

Route::get('/', 'HomeController@index');

Route::group(['prefix'=>'laravellikecomment', 'middleware' => 'web'], function (){
	Route::group(['middleware' => 'auth'], function (){
		Route::get('/like/vote', 'LikeController@vote');
		Route::get('/comment/add', 'CommentController@add');
	});
});

Auth::routes();