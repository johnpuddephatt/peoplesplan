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


Route::get('/', 'HomeController@index');
Route::get('/preview', 'HomeController@preview');
Route::get('/welcome', 'HomeController@welcome');


Route::get('/blog/{slug}', 'ArticleController@show');
Route::get('/blog/', 'ArticleController@index');

Route::get('/themes/{slug}', 'ThemeController@show');
Route::get('/themes/', 'ThemeController@index');

Route::get('/interviews/{slug}', 'InterviewController@show');

Route::get('/ideas/', 'IdeaController@index');
Route::get('/ideas/add/', 'IdeaController@add');
Route::get('/ideas/{slug}', 'IdeaController@show');

Route::post('/themes/new/{userhash}', 'IdeaController@store');

// Backpack dashboard routes
Route::group(
  [
    'prefix' => config('backpack.base.route_prefix'),
    'middleware' => 'isAdmin'
  ], function() {
  Route::get('dashboard', '\Backpack\Base\app\Http\Controllers\AdminController@dashboard')->name('backpack.dashboard');
  Route::get('/', '\Backpack\Base\app\Http\Controllers\AdminController@redirect')->name('backpack');
});

// Backpack CRUD routes
Route::group(
  [
    'namespace' => 'Admin',
    'prefix' => config('backpack.base.route_prefix'),
    'middleware' => 'isAdmin'
  ], function() {
  CRUD::resource('articles', 'ArticleCrudController');
  CRUD::resource('themes', 'ThemeCrudController');
  CRUD::resource('comments', 'CommentCrudController');
  CRUD::resource('users', 'UserCrudController');
  CRUD::resource('ideas', 'IdeaCrudController');
  CRUD::resource('interviews', 'InterviewCrudController');

});

// Like and comment routes
Route::group(['prefix'=>'laravellikecomment', 'middleware' => 'web'], function (){
	Route::group(['middleware' => 'auth'], function (){
		Route::get('/like/vote', 'LikeController@vote');
		Route::get('/comment/add', 'CommentController@add');
	});
});

// Auth routes
Auth::routes();


// OAuth Routes
Route::get('auth/{provider}', 'Auth\OAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\OAuthController@handleProviderCallback');