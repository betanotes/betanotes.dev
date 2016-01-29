<?php

class MeetupsController extends BaseController {

public function __construct()
{
	parent::__construct();
	$this->beforeFilter('auth');
}

// Shows all meetups for the user
		public function index()
		{
				$allmeetups = Meetup::with('attendees')->where('admin_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
				$allattending = DB::table('attendees')->where('attendee_id', Auth::user()->id)->get();
				$allgoing = [];
				if($allattending != null) {
					foreach($allattending as $attending) {
						$meetup = Meetup::find($attending->meetup_id);
						$meetupinfo = array(
							'id' => $meetup->id,
							'title' => $meetup->title,
							'location' => $meetup->location,
							'date' => $meetup->date,
							'time' => $meetup->time,
							'voteupcount' => $meetup->voteUpCount(),
							'votedowncount' => $meetup->voteDownCount(),
						);
						array_push($allgoing, $meetupinfo);
					}
				}
				return View::make('/meetups/index')->with('allmeetups', $allmeetups)->with('allgoing', $allgoing);
		}

// Meetup Creation

	// Shows Create Form
		public function createmeetup()
		{
				return View::make('/meetups/createmeetup');
			
		}

	// Saves the new meetup in the database
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

// Meetup Edit

	// Show edit form
		public function showedit($id)
		{
			$meetup = Meetup::find($id);
				if(Auth::user()->id == $meetup->admin_id) {
					return View::make('/meetups/editmeetup')->with('meetup', $meetup);
				} else {
					Session::flash('errorMessage', 'You are not the admin of this Social Study. You cannot edit it!');
					return Redirect::back();
				}
		}

	// Save new information in database
		public function updatemeetup($id)
		{
			$meetuptoupdate = Meetup::find($id);

			$title = Input::get('title') ? Input::get('title') : $meetuptoupdate->title;
			$description = Input::get('description') ? Input::get('description') : $meetuptoupdate->description;
			$date = Input::get('date') ? Input::get('date') : $meetuptoupdate->date;
			$time = Input::get('time') ? Input::get('time') : $meetuptoupdate->time;
			$location = Input::get('location') ? Input::get('location') : $meetuptoupdate->location;

			$meetuptoupdate->title = $title;
			$meetuptoupdate->description = $description;
			$meetuptoupdate->date = $date;
			$meetuptoupdate->time = $time;
			$meetuptoupdate->location = $location;
			$meetuptoupdate->save();
			return Redirect::action('MeetupsController@showmeetup', array($id));
		}

// Shows an individual meetup

	// Displays all information about a specific meetup
		public function showmeetup($id)
		{
				$meetup = Meetup::find($id);
				$adminid = $meetup->admin_id;
				$admin = User::find($adminid);
				$attendees = Attendee::all();
				$comments = DB::table('meetcoms')->where('meetup_id', $id)->orderBy('created_at', 'desc')->paginate(3);
				$allcomments = [];
				$allguests = [];

				foreach($comments as $comment) {
					if($comment->meetup_id == $meetup->id) {
						$commenter = User::find($comment->attendee_id);
						$commentdata = array(
							'created_at' => $comment->created_at,
							'id' => $comment->id,
							'commenter' => $commenter->firstname . ' ' . $commenter->lastname,
							'commenterid' => $commenter->id,
							'comment' => $comment->comment,
							'picture' => "../" . $commenter->image_url,
						);
						array_push($allcomments, $commentdata);
					}
				}
				foreach($attendees as $guests) {
					if($guests->meetup_id == $meetup->id) {
						$guest = User::find($guests->attendee_id);
						$guestname = $guest->firstname . ' ' . $guest->lastname;
						$guestinfo = array(
							'name' => $guestname,
							'picture' => $guest->image_url,
						);
						array_push($allguests, $guestinfo);
					}
				}

				return View::make('/meetups/showmeetup')->with('meetup', $meetup)->with('allguests', $allguests)->with('admin', $admin)->with('allcomments', $allcomments)->with('comments', $comments);
		}

	// Deletes the meetup from the database
		public function destroy($id)
		{
			$meetuptodelete = Meetup::find($id);
			if(Auth::user()->id != $meetuptodelete->admin_id) {
				Session::flash('errorMessage', 'You are not authorized to delete this Social Study!');
				return Redirect::action('MeetupsController@index');
			}
			$meetupcomments = DB::table('meetcoms')->where('meetup_id', $id);
			$meetupattendees = DB::table('attendees')->where('meetup_id', $id);
			$meetupcomments->delete();
			$meetupattendees->delete();
			$meetuptodelete->delete();
			Session::flash('successMessage', 'Social Study successfully deleted');
			return Redirect::action('MeetupsController@index');
		}

// Comment on a Meetup

	// Shows the form for posting a comment
		public function commentform($id)
		{
			$meetup = Meetup::find($id);
				$checkattendeeslist = DB::table('attendees')->where('attendee_id', Auth::user()->id)->where('meetup_id', $id)->pluck('attendee_id');
				if($checkattendeeslist != null || Auth::user()->id == $meetup->admin_id) {
					return View::make('/meetups/comment')->with('meetup', $meetup);
				}
		}

	// Saves the comment to the database
		public function postcomment($id)
		{
			$validator = Validator::make(Input::all(), Meetcom::$rules);
			$comment = new Meetcom();
			$comment->comment = Input::get('comment');
			$comment->meetup_id = $id;
			$comment->attendee_id = Auth::user()->id;
			if($validator->fails()) {
				Session::flash('errorMessage', 'Your comment must be between 1 and 400 characters');
				return Redirect::back()->withInput();
			} else {
				$comment->save();
				Session::flash('successMessage', 'Your comment was successfully posted!');
				return Redirect::action('MeetupsController@showmeetup', array($id));
			}
		}

	// Deletes the comment from the database
		public function deletecomment($id)
		{
			$commenttodelete = Meetcom::find($id);
			$meetup = Meetup::find($commenttodelete->meetup_id);
			if(Auth::user()->id != $commenttodelete->attendee_id || (Auth::user()->id != $commenttodelete->attendee_id && Auth::user()->id != $meetup->admin_id)) {
				Session::flash('errorMessage', 'You are not authorized to delete this comment!');
				return Redirect::action('MeetupsController@showmeetup', array($meetup->id));
			}
			$meetup = $commenttodelete->meetup_id;
			$commenttodelete->delete();
			Session::flash('successMessage', 'Comment successfully deleted');
			return Redirect::action('MeetupsController@showmeetup', array($meetup));
		}

	// Shows the comment edit page
		public function showeditcomment($id)
		{
			$comment = Meetcom::find($id);
			$meetup = Meetup::find($comment->meetup_id);

			if(Auth::user()->id != $comment->attendee_id || Auth::user()->id != $meetup->admin_id) {
				Session::flash('errorMessage', 'You are not authorized to edit this comment!');
				return Redirect::action('MeetupsController@showmeetup', array($meetup->id));
			}
				return View::make('/meetups/editcomment')->with('meetup', $meetup)->with('comment', $comment);
			
		}

	// Edits the comment
		public function editcomment($id)
		{
			$validator = Validator::make(Input::all(), Meetcom::$rules);
			if($validator->fails()) {
				Session::flash('errorMessage', 'Your comment must be between 1 and 400 characters');
				return Redirect::back()->withInput();
			} else {
				$validator = Validator::make(Input::all(), Meetcom::$rules);
				$commenttoupdate = Meetcom::find($id);
				$meetup = $commenttoupdate->meetup_id;
				$commenttoupdate->comment = Input::get('comment');
				$commenttoupdate->save();
				Session::flash('successMessage', 'Comment successfully updated!');
				return Redirect::action('MeetupsController@showmeetup', array($meetup));
			}
		}

// Invite a friend to join the Meetup

	// Shows the form to invite a friend
		public function showinvite($id)
		{
			$meetup = Meetup::find($id);
			if(Auth::user()->id == $meetup->admin_id) {
				return View::make('/meetups/invite')->with('meetup', $meetup);
			}
		}

	// Saves the guest's invitation in the database
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

	public function voteUp($id)
	{
		return $this->castVote($id, 1);
	}

	public function voteDown($id)
	{
		return $this->castVote($id, -1);
	}

	protected function castVote($id, $value)
	{
		$vote = Vote::firstOrNew([
			'user_id' => Auth::id(),
			'voteable_id' => $id,
			'voteable_type' => 'Meetup'
		]);

		$vote->vote = $value;
		$vote->save();

		return Redirect::back();
	}	
}
?>