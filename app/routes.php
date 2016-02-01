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

Route::DELETE('/users/edit', 'UsersController@destroy');

Route::get('/navbar', 'HomeController@navbar');

Route::get('/about', 'HomeController@about');

// Sheets

Route::resource('sheets', 'SheetsController');
Route::get('/sheets/{id}/matching', 'SheetsController@showMatching');

Route::get('/sheets/{id}/collaborate', 'CollaborationController@showcommentsheet');

Route::post('/sheets/{id}/collaborate', 'CollaborationController@commentsheet');

Route::get('/sheets/{id}/collaborate/{commentid}/edit', 'CollaborationController@showeditcommentsheet');

Route::post('/sheets/{id}/collaborate/{commentid}/edit', 'CollaborationController@editcommentsheet');

// Notes

Route::resource('notes', 'NotesController');

Route::get('/notes/{id}/collaborate', 'CollaborationController@showcommentnote');

Route::post('/notes/{id}/collaborate', 'CollaborationController@commentnote');

Route::get('/notes/{id}/collaborate/{commentid}/edit', 'CollaborationController@showeditcommentnote');

Route::post('/notes/{id}/collaborate/{commentid}/edit', 'CollaborationController@editcommentnote');

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

Route::get('/socialstudy/{id}/comment/edit', 'MeetupsController@showeditcomment');

Route::post('/socialstudy/{id}/comment/edit', 'MeetupsController@editcomment');

Route::get('/socialstudy/{id}/invite', 'MeetupsController@showinvite');

Route::post('/socialstudy/{id}/invite', 'MeetupsController@inviteguest');

Route::get('/feed', 'FeedController@showMain');

Route::get('/feed/sheets', 'FeedController@showSheets');

Route::get('/feed/notes', 'FeedController@showNotes');

Route::get('/feed/socialstudy', 'FeedController@showMeetups');

Route::get('/notes/{id}/up', 'NotesController@voteUp');

Route::get('/notes/{id}/down', 'NotesController@voteDown');

Route::get('/sheets/{id}/up', 'SheetsController@voteUp');

Route::get('/sheets/{id}/down', 'SheetsController@voteDown');

Route::get('/socialstudy/{id}/up', 'MeetupsController@voteUp');

Route::get('/socialstudy/{id}/down', 'MeetupsController');