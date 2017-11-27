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

Route::get('/', 'HomeController@public');

Route::get('/blog/', 'ArticleController@index');
Route::get('/blog/{slug}', 'ArticleController@show');

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function() {
  CRUD::resource('article', 'ArticleCrudController');
  CRUD::resource('comment', 'CommentCrudController');
});

Route::group(['prefix'=>'laravellikecomment', 'middleware' => 'web'], function (){
	Route::group(['middleware' => 'auth'], function (){
		Route::get('/like/vote', 'LikeController@vote');
		Route::get('/comment/add', 'CommentController@add');
	});
});
