<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('main');
	}

	public function dashboard()
	{
		$user = Auth::user();
		$userlists = DB::table('sheets')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
		$usernotes = DB::table('notes')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
		return View::make('/users/dashboard')->with('user', $user)->with('userlists', $userlists)->with('usernotes', $usernotes);
	}

	public function navbar() 
	{
		return View::make('/users/dashnav');
	}

	public function voteUpOrDown()
	{
		$vote = new Vote();
        $vote->user_id = Auth::user()->id;
		$vote->note_id = Input::get('note_id');
		$vote->vote = (bool)Input::get('vote');
		$vote->save();

		// dd(Input::get('vote'));
    }
}
