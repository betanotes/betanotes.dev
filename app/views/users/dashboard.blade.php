@extends('layouts.master')
@section('content')

<h1 class="text-center">Hello, {{{$user->firstname}}}!</h1>
<div class="container dashboard">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dashboardheader">
				<h3>Your Profile</h3>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dashboardheader">
				<h3>Your Notes</h3>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dashboardheader">
				<h3>Your Sheets</h3>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dashboardheader">
				<h3>Your Social Study-s</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dashboardcolumn">
				<ul class="userpageslist">
					<li><img class = "profilepic hidden-sm hidden-xs" src="{{{$user->image_url}}}"></li>
					<li><h5>Your Name: {{{$user->firstname}}} {{{$user->lastname}}}</h5></li>
					<li><h5>Your Email: {{{$user->email}}}</h5></li>
					<li><h5>You are affiliated with {{{$user->affiliation}}}</h5></li>
					<li><h5>You take breaks from working by {{{$user->break_type}}}</h5></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dashboardcolumn">
				<a href="/notes/create"><button class="btn btn-primary">Create a Note</button></a>
				@foreach($usernotes as $note)
				<ul class="userpageslist">
					<li><h5>{{{$note->title}}} ({{{$note->public_or_private}}})</h5></li>
					<h6>{{{Str::limit($note->body, 60)}}}</h6>
				</ul>
				@endforeach
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dashboardcolumn">
				<a href="/sheets/create"><button class="btn btn-primary">Create a List</button></a>
				@foreach($userlists as $lists)
				<ul class="userpageslist">
					<li><h5>{{{$lists->title}}} ({{{$lists->public_or_private}}})</h5></li>
				</ul>
				@endforeach
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 dashboardcolumn">
				<a href="/socialstudy/create"><button class="btn btn-primary">Create a Social Study</button></a>
				<h5>Social Studies you are admin of:</h5>
				@foreach($alladmin as $meetups)
				<ul class="userpageslist">
					<li><h5>{{{$meetups->title}}}</h5></li>
				</ul>
				@endforeach
				<h5>Social Studies you are attending:</h5>
				@foreach($meetupsyouarepartof as $yourmeetups)
				<ul class="userpageslist">
					<li><h5>{{{$yourmeetups}}}</h5></li>
				</ul>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop

</body>
</html>