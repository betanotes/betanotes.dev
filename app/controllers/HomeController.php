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
		$alladmin = DB::table('meetups')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
		$allmeetups = DB::table('attendees')->where('attendee_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
		$meetupsyouarepartof = [];
		if($allmeetups != null) {
			foreach($allmeetups as $individualmeetups) {
				$meetup = Meetup::find($individualmeetups->meetup_id);
				array_push($meetupsyouarepartof, $meetup->title);
			}
		} else {
			array_push($meetupsyouarepartof, 'You are not attending any meetups, or you are admin of all of them!');
		}
		return View::make('/users/dashboard')->with('user', $user)->with('userlists', $userlists)->with('usernotes', $usernotes)->with('alladmin', $alladmin)->with('meetupsyouarepartof', $meetupsyouarepartof);
	}

	public function navbar() 
	{
		return View::make('/users/dashnav');
	}

	public function voteUpOrDown()
	{
		$note = Note::find(Input::get('note_id'));
		$vote = Vote::where('user_id', '=', Auth::id())->where('note_id', '=', $note->id)->first();
		if($vote){
			$vote->vote = Input::get('vote');
			$vote->save();
		}else{
			$vote = new Vote();
	        $vote->user_id = Auth::user()->id;
			$vote->note_id = $note->id;
			$vote->vote = Input::get('vote');
			$vote->save();
		}
    }
}
