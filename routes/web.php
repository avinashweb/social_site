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

Route::group(['middleware'=>'guest'], function(){
	Route::get('/', [
		'uses'	=> 'UserController@getSignin',
		'as'	=> 'user-login'
	]);

	Route::post('/signup', [
		'uses'	=> 'UserController@postSignup',
		'as' 	=> 'signup' 
	]);

	Route::post('/signin', [
		'uses'	=> 'UserController@postSignin',
		'as'	=> 'singin'
	]);
});

Route::group(['middleware'=>'auth'], function(){
	Route::get('/home', [
		'uses'	=> 'UserController@home',
		'as'	=> 'home'
	]);

	Route::post('/post',[
		'uses'	=> 'PostController@postContent',
		'as'	=> 'post'
	]);
	Route::get('profile/{id}/{profile}', [
		'uses'	=> 'UserController@my_account',
		'as'	=> 'user_profile'
	]);

	Route::post('/update-img',[
		'uses' 	=> 'UserController@updata_avatar',
		'as'	=> 'profile-image'
	]);

	Route::get('{post_id}/delete', [
		'uses'	=> 'PostController@getDelete',
		'as'	=> 'delete'
	]);

	Route::get('/logout', [
		'uses'	=> 'UserController@getLogout',
		'as'	=> 'logout'
	]);

	Route::post('/edit', [
		'uses'	=> 'PostController@edit_ajax',
		'as'	=> 'edit'
	]);

	Route::post('/like', 'LikeController@like_ajax')->name('like');
});