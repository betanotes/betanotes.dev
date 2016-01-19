<?php

class UsersController extends BaseController {

	public function index()
	{
		if(Auth::check()) {
			$user = Auth::user();
			return View::make('/users/yourprofile')->with('user', $user);
		}
	}

	public function showlogin()
	{
		if(Auth::check()) {
			Session::flash('errorMessage', 'You are already logged in');
			return Redirect::action('UsersController@index');
		} else {
			return View::make('/users/login');
		}
	}

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

	public function logout()
	{
		if(Auth::check()) {
			Auth::logout();
			Session::flash('successMessage', 'Goodbye!');
			return Redirect::action('UsersController@showlogin');
		} else {
			Session::flash('errorMessage', 'You are not logged in yet!');
			return Redirect::action('UsersController@showlogin');
		}
	}

	public function showsignup()
	{
		return View::make('/users/signup');
	}

	public function store()
	{
		$newuser = new User();
		$newuser->firstname = Input::get('firstname');
		$newuser->lastname = Input::get('lastname');
		$newuser->password = Hash::make(Input::get('password'));
		$newuser->email = Input::get('email');
		$newuser->break_type = Input::get('break_type');
		$newuser->affiliation = Input::get('affiliation');

		$imagename = Input::file('image_url');
		$originalname = $imagename->getClientOriginalName();
		$imagepath = 'public/img/uploads/';
		$imagename->move($imagepath, $originalname);
		$newuser->image_url = $imagepath . $originalname;

		$checkdbforemail = DB::table('users')->where('email', Input::get('email'))->pluck('email');

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
	public function showedit()
	{
		return View::make('/users/editprofile');
	}

	public function update()
	{
		if(Auth::check()) {
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
}

?>