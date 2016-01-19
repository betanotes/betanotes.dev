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
			return Redirect::intended('/users');
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
}
?>