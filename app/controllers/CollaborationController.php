<?php
class CollaborationController extends BaseController {

// Collaboration on Notes

	// Shows the invitation 
		public function showinvitenote($id)
		{
			$note = Note::find($id);
			if(Auth::check()) {
				if(Auth::user()->id == $note->id) {
					return View::make('/collaboration/invitenote')->with('note', $note);
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
			$persontoinvite = User::find($invitee);
			$collaborator = new Notecollaborator();
			$collaborator->note_id = $id;
			$collaborator->collaborator_id = $persontoinvite->id;
			$collaborator->collaborator_name = $persontoinvite->firstname . ' ' . $persontoinvite->lastname;
			$collaborator->collaborator_email = $persontoinvite->email;
			$checkforinvite = DB::table('notecollaborators')->where('note_id', $id)->where('collaborator_id', $invitee)->pluck('collaborator_id');

			if($invitee != null) {
				if($checkforinvite == null) {
					$collaborator->save();
					Session::flash('successMessage', 'Collaborator successfully invited!');
					return Redirect::action('NotesController@show', array($id));
				} else {
					Session::flash('errorMessage', 'This person is already collaborating on this note');
					return Redirect::back();
				}
			} else {
				Session::flash('errorMessage', 'This person is not registered on Social Notes');
				return Redirect::back();
			}
		}

	// Shows the form for commenting on a note
		public function showcommentnote($id)
		{
			$note = Note::find($id);
			if(Auth::check()) {
				$checkcollaboratorlist = DB::table('notecollaborators')->where('collaborator_id', Auth::user()->id)->where('note_id', $id)->pluck('collaborator_id');
				if($checkcollaboratorlist != null || Auth::user()->id == $note->user_id) {
					return View::make('/collaboration/commentnote')->with('note', $note);
				} else {
					Session::flash('errorMessage', 'You are not authorized to collaborate on this note!');
					return Redirect::back();
				}
			} else {
				Session::flash('errorMessage', 'You must be logged in to continue!');
				return Redirect::back();
			}
		}

	// Saves the comment in the database
		public function commentnote($id)
		{
			$validator = Validator::make(Input::all(), Notecom::$rules);
			$comment = new Notecom();
			$comment->comment = Input::get('comment');
			$comment->note_id = $id;
			$comment->collaborator_id = Auth::user()->id;
			if($validator->fails()) {
				Session::flash('errorMessage', 'Your input must be between 1 and 1000 characters');
				return Redirect::back()->withInput();
			} else {
				$comment->save();
				Session::flash('successMessage', 'Your input was successfully added!');
				return Redirect::action('NotesController@show', array($id));
			}
		}

	// Shows the comment edit page
		public function showeditcommentnote($id, $commentid)
		{
			$comment = Notecom::find($commentid);
			$note = Note::find($id);
			if(Auth::check()) {
				return View::make('/collaboration/editcommentnote')->with('comment', $comment)->with('note', $note);
			} else {
				Session::flash('errorMessage', 'You must be logged in to continue!');
				return Redirect::action('UsersController@showlogin');
			}
		}

	// Saves the edited information to the database
		public function editcommentnote($id, $commentid)
		{
			$validator = Validator::make(Input::all(), Notecom::$rules);
			if($validator->fails()) {
				Session::flash('errorMessage', 'Your input must be between 1 and 1000 characters');
				return Redirect::back()->withInput();
			} else {
				$commenttoupdate = Notecom::find($commentid);
				$note = $id;
				$commenttoupdate->comment = Input::get('comment');
				$commenttoupdate->save();
				Session::flash('successMessage', 'Input successfully updated!');
				return Redirect::action('NotesController@show', array($id));
			}
		}

// Collaboration on Sheets

	// Shows the invitation
		public function showinvitesheet($id)
		{
			$sheet = Sheet::find($id);
			if(Auth::check()) {
				if(Auth::user()->id == $sheet->user_id) {
					return View::make('/collaboration/invitesheet')->with('sheet', $sheet);
				} else {
					Session::flash('errorMessage', 'You are not authorized to invite collaborators to this sheet');
					return Redirect::back();
				}
			} else {
				Session::flash('errorMessage', 'You must be logged in to continue!');
				return Redirect::action('UsersController@showlogin');
			}
		}

	// Saves the invitee in the database
		public function invitesheet($id)
		{
			$invitee = DB::table('users')->where('email', Input::get('email'))->pluck('id');
			$persontoinvite = User::find($invitee);
			$collaborator = new Sheetcollaborator();
			$collaborator->sheet_id = $id;
			$collaborator->collaborator_id = $persontoinvite->id;
			$collaborator->collaborator_name = $persontoinvite->firstname . ' ' . $persontoinvite->lastname;
			$collaborator->collaborator_email = $persontoinvite->email;

			$checkforinvite = DB::table('sheetcollaborators')->where('sheet_id', $id)->where('collaborator_id', $invitee)->pluck('collaborator_id');

			if($invitee != null) {
				if($checkforinvite == null) {
					$collaborator->save();
					Session::flash('successMessage', 'Collaborator successfully invited!');
					return Redirect::action('SheetsController@show', array($id));
				} else {
					Session::flash('errorMessage', 'This person has already been invited to Collaborate');
					return Redirect::back();
				}
			} else {
				Session::flash('errorMessage', 'You must be logged in to continue!');
				return Redirect::back();
			}
		}

	// Shows the form for commenting on a sheet
		public function showcommentsheet($id)
		{
			$sheet = Sheet::find($id);
			if(Auth::check()) {
				$checkcollaboratorlist = DB::table('sheetcollaborators')->where('collaborator_id', Auth::user()->id)->where('sheet_id', $id)->pluck('collaborator_id');
				if($checkcollaboratorlist != null || Auth::user()->id == $sheet->user_id) {
					return View::make('/collaboration/commentsheet')->with('sheet', $sheet);
				} else {
					Session::flash('errorMessage', 'You are not authorized to collaborate on this sheet!');
					return Redirect::back();
				}
			} else {
				Session::flash('errorMessage', 'You must be logged in to continue');
				return Redirect::action('UsersController@showlogin');
			}
		}

	// Saves the comment in the database
		public function commentsheet($id)
		{
			$validator = Validator::make(Input::all(), Sheetcom::$rules);
			$comment = new Sheetcom();
			$comment->comment = Input::get('comment');
			$comment->sheet_id = $id;
			$comment->collaborator_id = Auth::user()->id;

			if($validator->fails()) {
				Session::flash('errorMessage', 'Your input must be between 1 and 1000 characters');
				return Redirect::back()->withInput();
			} else {
				$comment->save();
				Session::flash('successMessage', 'Your input was successfully added!');
				return Redirect::action('SheetsController@show', array($id));
			}
		}

	// Shows the form for editing a comment
		public function showeditcommentsheet($id, $commentid)
		{
			$comment = Sheetcom::find($commentid);
			$sheet = Sheet::find($id);
			if(Auth::check()) {
				return View::make('/collaboration/editcommentsheet')->with('comment', $comment)->with('sheet', $sheet);
			} else {
				Session::flash('errorMessage', 'You must be logged in to continue!');
				return Redirect::action('UsersController@showlogin');
			}
		}

	// Saves the updated information to the database.
		public function editcommentsheet($id, $commentid)
		{
			$validator = Validator::make(Input::all(), Sheetcom::$rules);
			if($validator->fails()) {
				Session::flash('errorMessage', 'Your input must be between 1 and 1000 characters!');
				return Redirect::back()->withInput();
			} else {
				$commenttoupdate = Sheetcom::find($commentid);
				$sheet = $id;
				$commenttoupdate->comment = Input::get('comment');
				$commenttoupdate->save();
				Session::flash('successMessage', 'Your input was successfully updated!');
				return Redirect::action('SheetsController@show', array($id));
			}
		}
}
?>