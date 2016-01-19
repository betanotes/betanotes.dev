<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/navbar', 'HomeController@navbar');

Route::resource('studylists', 'StudylistsController');

Route::resource('notes', 'NotesController');

Route::get('/users', 'UsersController@index');

Route::get('/login', 'UsersController@showlogin');

Route::post('/login', 'UsersController@dologin');

Route::get('/signup', 'UsersController@showsignup');

Route::post('/signup', 'UsersController@store');

Route::get('/logout', 'UsersController@logout');

Route::get('/users/edit', 'UsersController@showedit');

Route::post('/users/edit', 'UsersController@update');
