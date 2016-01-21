{{-- Upper Navbar --}}
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-14 col-md-14 col-sm-14 col-xs-14 text-center uppernavbar">
			<a href="{{{action('HomeController@showWelcome')}}}"><div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 upnav firstnav">Life is a test. Ace it!</div></a>
			<div class="col-lg-4 upnav secondnav">
				<form class="form-horizontal">
					<div class="col-lg-8 hidden-sm hidden-xs"><input type="text" class="form-control" name="search"></div>
					<div class="col-lg-1 hidden-sm hidden-xs"><button class="btn btn-primary">Search Notes</button></div>
				</form>
			</div>
			<div class="col-lg-3 upnav thirdnav">
				@if(Auth::check())
					<a class="hidden-sm hidden-xs" href="{{{action('HomeController@dashboard')}}}">{{{Auth::user()->firstname}}} {{{Auth::user()->lastname}}} is logged in!</a>
				@else
					<a href="{{{action('UsersController@showsignup')}}}">Sign Up</a>
				@endif
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-13 upnav lastnav">
				@if(Auth::check())
					<a href="{{{action('UsersController@logout')}}}">Log Out</a>
				@else
					<a href="{{{action('UsersController@showlogin')}}}">Log In</a>
				@endif
			</div>
		</div>
	</div>
</div>

@if(Auth::check())
{{-- Lower Navbar --}}
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-14 text-center dashboardnavbar">
			<a href="{{{action('UsersController@index')}}}"><div class="col-lg-3 navlink"<?php if(Request::url() == "http://betanotes.dev/users") {?>style="background-color: #ff8000"<?php }?>>
				Profile
			</div></a>
			<a href="{{{action('NotesController@index')}}}"><div class="col-lg-3 navlink"<?php if(Request::url() == "http://betanotes.dev/notes") {?>style="background-color: #ff8000"<?php }?>>
				Notes
			</div></a>
			<a href="{{{action('SheetsController@index')}}}"><div class="col-lg-3 navlink"<?php if(Request::url() == "http://betanotes.dev/sheets") {?>style="background-color: #ff8000"<?php }?>>
				Lists
			</div></a>
			<div class="col-lg-3 navlink lastnavlink">
				Quizzes
			</div>
		</div>
	</div>
</div>
@endif