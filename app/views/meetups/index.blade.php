@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="/css/meetups.css">
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3 class="topofmeetupindex">Want to create your own study group?</h3>
			<a href="{{{action('MeetupsController@createmeetup')}}}"><button class="btn btn-primary">Set up a Social Study!</button></a>
			@foreach($allmeetups as $meetup)
			<div class="meetuphead">
				<h2>{{{$meetup->title}}}</h2>
				<h3>{{{$meetup->description}}}</h3>
				<h4>{{{$meetup->location}}}</h4>
				<h5>{{{$meetup->date}}} at {{{$meetup->time}}}</h5>
				<a href="{{{action('MeetupsController@showmeetup', array($meetup->id))}}}"><button class="btn btn-primary">Check it out!</button></a>
			</div>
			@endforeach
			{{$allmeetups->links()}}
		</div>
	</div>
</div>
@stop