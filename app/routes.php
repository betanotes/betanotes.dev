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

Route::DELETE('/dashboard', 'UsersController@destroy');

Route::get('/navbar', 'HomeController@navbar');

Route::resource('sheets', 'SheetsController');

Route::resource('notes', 'NotesController');

Route::get('/users', 'UsersController@index');

Route::get('/login', 'UsersController@showlogin');

Route::post('/login', 'UsersController@dologin');

Route::get('/signup', 'UsersController@showsignup');

Route::post('/signup', 'UsersController@store');

Route::get('/logout', 'UsersController@logout');

Route::get('/users/edit', 'UsersController@showedit');

Route::post('/users/edit', 'UsersController@update');

Route::get('/socialstudy', 'MeetupsController@index');

Route::get('/socialstudy/create', 'MeetupsController@createmeetup');

Route::post('/socialstudy/create', 'MeetupsController@store');

Route::get('/socialstudy/{id}/edit', 'MeetupsController@showedit');

Route::post('/socialstudy/{id}/edit', 'MeetupsController@updatemeetup');

Route::get('/socialstudy/{id}', 'MeetupsController@showmeetup');

Route::DELETE('/socialstudy/{id}', 'MeetupsController@destroy');

Route::get('/socialstudy/{id}/comment', 'MeetupsController@commentform');

Route::post('/socialstudy/{id}/comment', 'MeetupsController@postcomment');

Route::DELETE('/socialstudy/{id}/comment', 'MeetupsController@deletecomment');

Route::get('/socialstudy/{id}/invite', 'MeetupsController@showinvite');

Route::post('/socialstudy/{id}/invite', 'MeetupsController@inviteguest');

Route::get('/feed', 'FeedController@showMain');

Route::get('/feed/sheets', 'FeedController@showSheets');

Route::get('/feed/notes', 'FeedController@showNotes');

Route::get('/feed/socialstudy', 'FeedController@showMeetups');

Route::post('/voteUpOrDown', 'HomeController@voteUpOrDown');
