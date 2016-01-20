@extends('layouts.master')
@section('content')

<h1 class="text-center">Hello, {{{$user->firstname}}}!</h1>
<div class="container dashboard">
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="col-lg-4 dashboardheader">
				<h3>Your Profile</h3>
			</div>
			<div class="col-lg-4 dashboardheader">
				<h3>Your Notes</h3>
			</div>
			<div class="col-lg-4 dashboardheader">
				<h3>Your lists</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="col-lg-4 dashboardcolumn">
				<ul>
					<li><img src="{{{$user->image_url}}}"></li>
					<li><h5>Your Name: {{{$user->firstname}}} {{{$user->lastname}}}</h5></li>
					<li><h5>Your Email: {{{$user->email}}}</h5></li>
				</ul>
			</div>
			<div class="col-lg-4 dashboardcolumn">
				@foreach($usernotes as $note)
				<ul>
					<li><h5>{{{$note->title}}} ({{{$note->public_or_private}}})</h5></li>
				</ul>
				@endforeach
			</div>
			<div class="col-lg-4 dashboardcolumn">
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