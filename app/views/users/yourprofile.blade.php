@extends('layouts.master')
@section('content')
<body class="profilepagebody">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				<img class="profilepic" src="{{{$user->image_url}}}">
			</div>
			<div class="col-lg-6 text-center">
				<ul class="profilehead">
					<h2><li>{{{$user->firstname}}} {{{$user->lastname}}}</li></h2>
					<h2><li>{{{$user->affiliation}}}</li></h2>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<h1 class="profileheading1">Your Recent Notes</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<ul class="profilesubstance">
				@foreach($usernotes as $note)
					<h3><li>{{{$note->title}}} ({{{$note->public_or_private}}})</li></h3>
					<h5>{{{$note->body}}}</h5>
					<button class="btn btn-primary">Edit this Note</button>
				@endforeach
				<li><button class="btn btn-warning allbutton">All Your Notes</button></li>
			</ul>
			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<h1 class="profileheading">Your Recent Sheets</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<ul class="profilesubstance">
				@foreach($usersheets as $sheet)
					<h3><li>{{{$sheet->title}}} ({{{$note->public_or_private}}})</li></h3>
					<button class="btn btn-primary">Edit this Sheet</button>
				@endforeach
				<li><button class="btn btn-warning allbutton">All Your Sheets</button></li>
			</ul>
		</div>
	</div>
	<a href="{{{action('HomeController@dashboard')}}}"><button class="btn btn-primary">Back to Dashboard</button></a>
	<a href="{{{action('UsersController@logout')}}}"><button class="btn btn-danger">Log Out</button></a>
</div>
</body>
@stop
</html>