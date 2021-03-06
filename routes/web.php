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




//Auth::routes();
	$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
	$this->post('login', 'Auth\LoginController@login');
	$this->post('logout', 'Auth\LoginController@logout')->name('logout');
	
	
	// Password Reset Routes...
	$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'PostController@index')->name('home');


Route::middleware('auth')->group(function (){
	Route::resource('post', 'PostController', ['except'=>['index', 'show']]);
	Route::resource('user', 'UsersControllers');
});
	Route::resource('post', 'PostController', ['only'=>['index', 'show']]);
	Route::get('post/user/{id}', 'PostController@userPosts')->name('user.posts');
