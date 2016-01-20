{{-- Upper Navbar --}}
<div class="container">
	<div class="row">
		<div class="col-lg-14 text-center uppernavbar">
			<a href="{{{action('HomeController@showWelcome')}}}"><div class="col-lg-3 upnav firstnav">Life is a test. Ace it!</div></a>
			<div class="col-lg-4 upnav secondnav">
				<form class="form-horizontal">
					<div class="col-lg-8"><input type="text" class="form-control" name="search"></div>
					<div class="col-lg-1"><button class="btn btn-primary">Search Notes</button></div>
				</form>
			</div>
			<div class="col-lg-3 upnav thirdnav">
				@if(Auth::check())
					{{{Auth::user()->firstname}}} {{{Auth::user()->lastname}}} is logged in!
				@else
					<a href="{{{action('UsersController@showsignup')}}}">Sign Up</a>
				@endif
			</div>
			<div class="col-lg-2 upnav lastnav">
				@if(Auth::check())
					<a href="{{{action('UsersController@logout')}}}">Log Out</a>
				@else
					<a href="{{{action('UsersController@showlogin')}}}">Log In</a>
				@endif
			</div>
		</div>
	</div>
</div>

{{-- Lower Navbar --}}
<div class="container">
	<div class="row">
		<div class="col-lg-14 text-center dashboardnavbar">
			<a href="{{{action('UsersController@index')}}}"><div class="col-lg-3 navlink">
				Profile
			</div></a>
			<div class="col-lg-3 navlink">
				Notes
			</div>
			<a href="{{{action('SheetsController@index')}}}"><div class="col-lg-3 navlink">
				Lists
			</div></a>
			<div class="col-lg-3 navlink lastnavlink">
				Quizzes
			</div>
		</div>
	</div>
</div>