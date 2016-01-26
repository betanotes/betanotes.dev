<?php
class CollaborationController extends BaseController {

// Collaboration on Notes

	// Shows the invitation 
		public function showinvitenote($id)
		{
			$note = Note::find($id)
			if(Auth::check()) {
				if(Auth::user()->id == $note->id) {
					return View::make('/collaboration/invitenote');
				} else {
					Session::flash('errorMessage', 'You are not authorized to invite people to collaborate on this note');
					return Redirect::back();
				}
			} else {
				Session::flash('errorMessage', 'You must be logged in!');
				return Redirect::action('UsersController@showlogin');
			}
		}

	// Saves the invitee in the database
		public function invitenote($id)
		{
			$invitee = DB::table('users')->where('email', Input::get('email'))->pluck('id');
			$collaborator = new 
		}

	// Shows the form for commenting on a note
		public function showcommentnote()
		{

		}

	// Saves the comment in the database
		public function commentnote()
		{

		}

// Collaboration on Sheets

	// Shows the invitation
		public function showinvitesheet()
		{

		}

	// Saves the invitee in the database
		public function invitesheet()
		{

		}

	// Shows the form for commenting on a sheet
		public function showcommentsheet()
		{

		}

	// Saves the comment in the database
		public function commentsheet()
		{

		}
}
?>