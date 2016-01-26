<?php

class UsersController extends BaseController {

public function __construct()
{
	parent::__construct();
	$this->beforeFilter('auth', array('except' =>array('showlogin', 'showsignup')));
}
// User Profile (no longer being used)

	// Displays all user information
		public function index()
		{
				$user = Auth::user();
				$usernotes = DB::table('notes')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
				$usersheets = DB::table('sheets')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
				return View::make('/users/yourprofile')->with('user', $user)->with('usernotes', $usernotes)->with('usersheets', $usersheets);
		}

// Sign Up

	// Shows the sign up form
		public function showsignup()
		{
			return View::make('/users/signup');
		}

	// Stores the new user in the database
		public function store()
		{
			$validator = Validator::make(Input::all(), User::$rules);
			$newuser = new User();
			$newuser->firstname = Input::get('firstname');
			$newuser->lastname = Input::get('lastname');
			$newuser->password = Hash::make(Input::get('password'));
			$newuser->email = Input::get('email');
			$newuser->break_type = Input::get('break_type');
			$newuser->affiliation = Input::get('affiliation');

		if(Input::file('image_url') != null) {
			$imagename = Input::file('image_url');
			$originalname = $imagename->getClientOriginalName();
			$imagepath = 'public/img/uploads/';
			$imagename->move($imagepath, $originalname);
			$newuser->image_url = $imagepath . $originalname;
		}

			$checkdbforemail = DB::table('users')->where('email', Input::get('email'))->pluck('email');
			if($validator->fails()) {
				Session::flash('errorMessage', 'Sorry, one or more of your inputs did not meet our requirements');
				return Redirect::back()->withInput()->withErrors($validator);
			}
			if($checkdbforemail == null) {
				if(Input::get('password') == Input::get('confirm')) {
					$newuser->save();
					Session::flash('successMessage', 'Your information has been saved');
					return Redirect::action('UsersController@showlogin');
				} else {
					Session::flash('errorMessage', 'Your passwords do not match!');
					return Redirect::back()->withInput();
				}
			} else {
				Session::flash('errorMessage', 'This email is already in use!');
				return Redirect::back()->withInput();
			}
		}

// Log In

	// Shows the log in form
		public function showlogin()
		{
				Session::flash('errorMessage', 'You are already logged in');
				return Redirect::action('UsersController@index');
		}

	// Checks against the database
		public function dologin()
		{
			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);

			if(Auth::attempt($userdata)) {
				Session::flash('successMessage', 'Welome back!');
				return Redirect::intended('/dashboard');
			} else {
				return Redirect::back();
			}
		}

// Log Out

	// Logs you out
		public function logout()
		{
				Auth::logout();
				Session::flash('successMessage', 'Goodbye!');
				return Redirect::action('UsersController@showlogin');
		}

// Edit Profile

	// Shows you the edit page
		public function showedit()
		{
			return View::make('/users/editprofile');
		}

	// Stores your new information in the database
		public function update()
		{
			$validator = Validator::make(Input::all(), User::$editrules);

				$usertoupdate = Auth::user();
				$usertoupdate->firstname = (Input::has('firstname') ? Input::get('firstname') : Auth::user()->firstname);
				$usertoupdate->lastname = (Input::has('lastname') ? Input::get('lastname') : Auth::user()->lastname);
				$usertoupdate->break_type = (Input::has('break_type') ? Input::get('break_type') : Auth::user()->break_type);
				$usertoupdate->affiliation = (Input::has('affiliation') ? Input::get('affiliation') : Auth::user()->affiliation);
				$usertoupdate->password = (Input::has('password') ? Input::get('password') : Auth::user()->password);

				$usertoupdate->image_url = (Input::has('image_url') ? Input::file('image_url') : Auth::user()->image_url);
				if($usertoupdate->image_url == Input::file('image_url')) {
					$imagename = Input::file('image_url');
					$originalname = $imagename->getClientOriginalName();
					$imagepath = 'public/img/uploads/';
					$imagename->move($imagepath, $originalname);
					$newuser->image_url = $imagepath . $originalname;
				}

				$checkdbforemail = DB::table('users')->where('email', Input::get('email'))->pluck('email');
				if($validator->fails()) {
					Session::flash('errormessage', 'Sorry, some of your inputs did not meet our requirements');
					return Redirect::back()->withInput()->withErrors($validator);
				} else {
					if($checkdbforemail == null || $checkdbforemail == Auth::user()->email) {
						if($checkdbforemail != Auth::user()->email) {
							$usertoupdate->email = Input::get('email');
						}
						
						$usertoupdate->save();
						Session::flash('successMessage', 'Profile successfully updated');
						return Redirect::action('HomeController@dashboard');
					} else {
						Session::flash('errorMessage', 'This email is already in use!');
						return Redirect::back()->withInput();
					}
				}
		}

// Delete Profile
		public function destroy()
		{
			$id = Auth::user()->id;
			$usertodelete = User::find($id);
			$usernotes = DB::table('notes')->where('user_id', $id);
			$allsheets = Sheet::all();
			$allmeetups = Meetup::all();
			$usermeetups = DB::table('meetups')->where('admin_id', $id);
			$userattending = DB::table('attendees')->where('attendee_id', $id);
			$usercomments = DB::table('meetcoms')->where('attendee_id', $id);
			$sheetids = [];
			$meetupids = [];
			$usercomments->delete();

			foreach($allsheets as $sheet) {
				if($sheet->user_id == $id) {
					array_push($sheetids, $sheet->id);
				}
			}

			foreach($sheetids as $sheets) {
				$userline = DB::table('lines')->where('sheet_id', $sheets);
				$userline->delete();
			}	

			foreach($allmeetups as $meetup) {
				if($meetup->admin_id == $id) {
					array_push($meetupids, $meetup->id);
				}
			}
			foreach($meetupids as $meetups) {
				$peopleattending = DB::table('attendees')->where('meetup_id', $meetups);
				$peopleattending->delete();
			}

			$userattending->delete();
			$usernotes->delete();

			$userssheets = DB::table('sheets')->where('user_id', $id);
			$userssheets->delete();
			$usermeetups->delete();

			$usertodelete->delete();

			Session::flash('successMessage', 'Goodbye Forever');
			return Redirect::action('UsersController@showlogin');
		}
}
?>