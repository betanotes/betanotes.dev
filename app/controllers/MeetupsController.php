<?php

class MeetupsController extends BaseController {

	public function index()
	{
		$allmeetups = Meetup::paginate(5);
		return View::make('/meetups/index')->with('allmeetups', $allmeetups);
	}

	public function createmeetup()
	{
		if(Auth::check()) {
			return View::make('/meetups/createmeetup');
		}
	}

	public function store()
	{
		$meetup = new Meetup();
		$meetup->title = Input::get('title');
		$meetup->description = Input::get('description');
		$meetup->date = Input::get('date');
		$meetup->time = Input::get('time');
		$meetup->location = Input::get('location');
		$meetup->admin_id = Auth::user()->id;
		$meetup->save();
		return Redirect::action('MeetupsController@index');
	}

	public function showedit()
	{
		return View::make('/meetups/editmeetup');
	}

	public function updatemeetup()
	{
		return Redirect::back();
	}

	public function showmeetup($id)
	{
		$meetup = Meetup::find($id);
		$adminid = $meetup->admin_id;
		$admin = User::find($adminid);
		$attendees = Attendee::all();
		// $comments = DB::table('meetcom')->where('meetup_id', $id);
		
		$allguests = [];

		foreach($attendees as $guests) {
			if($guests->meetup_id == $meetup->id) {
				$guest = User::find($guests->attendee_id);
				$guestname = $guest->firstname . ' ' . $guest->lastname;
				array_push($allguests, $guestname);
			}
		}

		return View::make('/meetups/showmeetup')->with('meetup', $meetup)->with('allguests', $allguests)->with('admin', $admin);
	}

	public function commentform($id)
	{
		$meetup = Meetup::find($id);
		if(Auth::check()) {
			$checkattendeeslist = DB::table('attendees')->where('attendee_id', Auth::user()->id)->where('meetup_id', $id)->pluck('attendee_id');
			if($checkattendeeslist != null || Auth::user()->id == $meetup->admin_id) {
				return View::make('/meetups/comment')->with('meetup', $meetup);
			}
		}
	}

	public function postcomment($id)
	{
		
		$comment = new Meetcom();
		$comment->comment = Input::get('comment');
		$comment->meetup_id = $id;
		$comment->attendee_id = Auth::user()->id;
		$comment->save();
		return Redirect::action('MeetupsController@showmeetup', array($id));
	}

	public function showinvite($id)
	{
		$meetup = Meetup::find($id);
		if(Auth::check() && Auth::user()->id == $meetup->admin_id) {
			return View::make('/meetups/invite')->with('meetup', $meetup);
		}
	}

	public function inviteguest($id)
	{
		$invitee = DB::table('users')->where('email', Input::get('email'))->pluck('id');
		$attendee = new Attendee();
		$attendee->meetup_id = $id;
		$attendee->attendee_id = $invitee;
		$checkforinvite = DB::table('attendees')->where('meetup_id', $id)->where('attendee_id', $invitee)->pluck('attendee_id');
		if($invitee != null) {
			if($checkforinvite == null) {
				$attendee->save();
				Session::flash('successMessage', 'Guest successfully invited!');
				return Redirect::action('MeetupsController@showinvite', array($id));
			} else {
				Session::flash('errorMessage', 'This guest has already been invited!');
				return Redirect::back();
			}
		} else {
			Session::flash('errorMessage', 'This email does not exist in our system!');
			return Redirect::back();
		}
	}
}
?>