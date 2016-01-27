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

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('auth', array('except' => array('showWelcome')));
	}

	public function showWelcome()
	{
		return View::make('main');
	}

	public function dashboard()
	{
		$user = Auth::user();

		$publicnotes = Note::where('user_id', '=', Auth::user()->id)->where('public_or_private', '=', 'public')->get();
		$privatenotes = Note::where('user_id', '=', Auth::user()->id)->where('public_or_private', '=', 'private')->get();

		$publicsheets = Sheet::where('user_id', '=', Auth::user()->id)->where('public_or_private', '=', 'public')->get();
		$privatesheets = Sheet::where('user_id', '=', Auth::user()->id)->where('public_or_private', '=', 'private')->get();

		$publicmeetups = Meetup::where('admin_id', '=', Auth::user()->id)->get();

		$yournotes = Note::where('user_id', '=', Auth::user()->id)->take(5)->get();
		$yoursheets = Sheet::where('user_id', '=', Auth::user()->id)->take(5)->get();
		$yourmeetups = Meetup::where('admin_id', '=', Auth::user()->id)->take(5)->get();

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
		return View::make('/users/dashboard')->with('user', $user)->with('userlists', $userlists)->with('usernotes', $usernotes)->with('alladmin', $alladmin)->with('meetupsyouarepartof', $meetupsyouarepartof)->with('publicnotes', $publicnotes)->with('privatenotes', $privatenotes)->with('publicsheets', $publicsheets)->with('privatesheets', $privatesheets)->with('publicmeetups', $publicmeetups)->with('yournotes', $yournotes)->with('yoursheets', $yoursheets)->with('yourmeetups', $yourmeetups);
	}

	public function navbar() 
	{
		return View::make('/users/dashnav');
	}

	public function voteUpOrDown()
	{
		$note = Note::find(Input::get('note_id'));
		$sheet = Sheet::find(Input::get('sheet_id'));
		$meetup = Meetup::find(Input::get('meetup_id'));

		if(Input::has('note_id')){
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
		}elseif(Input::has('sheet_id')){
			$vote = Vote::where('sheet_id', '=', Auth::id())->where('sheet_id', '=', $sheet->id)->first();
						if($vote){
				$vote->vote = Input::get('vote');
				$vote->save();
			}else{
				$vote = new Vote();
		        $vote->user_id = Auth::user()->id;
				$vote->sheet_id = $sheet->id;
				$vote->vote = Input::get('vote');
				$vote->save();
			}
		}elseif(Input::has('meetup_id')){
			$vote = Vote::where('meetup_id', '=', Auth::id())->where('meetup_id', '=', $meetup->id)->first();
						if($vote){
				$vote->vote = Input::get('vote');
				$vote->save();
			}else{
				$vote = new Vote();
		        $vote->user_id = Auth::user()->id;
				$vote->meetup_id = $meetup->id;
				$vote->vote = Input::get('vote');
				$vote->save();
			}
		}	
    }
}
