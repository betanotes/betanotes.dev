@extends('layouts.master')
@section('content')

<h1 class="text-center">Hello, {{{$user->firstname}}}!</h1>
<div class="container dashboard">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dashboardheader">
				<h3>Your Profile</h3>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dashboardheader">
				<h3>Your Notes</h3>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dashboardheader">
				<h3>Your lists</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dashboardcolumn">
				<ul>
					<li><img class = "hidden-sm hidden-xs" src="{{{$user->image_url}}}"></li>
					<li><h5>Your Name: {{{$user->firstname}}} {{{$user->lastname}}}</h5></li>
					<li><h5>Your Email: {{{$user->email}}}</h5></li>
					<li><h5>You are affiliated with {{{$user->affiliation}}}</h5></li>
					<li><h5>You take breaks from working by {{{$user->break_type}}}</h5></li>
				</ul>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dashboardcolumn">
				<button class="btn btn-primary">Create a Note</button>
				@foreach($usernotes as $note)
				<ul>
					<li><h5>{{{$note->title}}} ({{{$note->public_or_private}}})</h5></li>
					<h6>{{{Str::limit($note->body, 60)}}}</h6>
				</ul>
				@endforeach
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 dashboardcolumn">
				<button class="btn btn-primary">Create a List</button>
				@foreach($userlists as $lists)
				<ul>
					<li><h5>{{{$lists->title}}} ({{{$lists->public_or_private}}})</h5></li>
				</ul>
				@endforeach
			</div>
		</div>
	</div>
</div>
@stop

</body>
</html>