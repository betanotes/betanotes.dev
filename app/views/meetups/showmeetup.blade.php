@extends('layouts.master');
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>{{{$meetup->title}}}</h3>
			<h4>{{{$meetup->description}}}</h4>
			<h5>{{{$meetup->location}}}</h5>
			<h5>{{{$meetup->date}}} at {{{$meetup->time}}}</h5>
			<a href="{{{action('MeetupsController@showinvite', array($meetup->id))}}}"><button class="btn btn-primary">Invite a friend to this Social Study!</button></a>
			People attending this Social Study:
			<ul>
				<li>{{{$admin->firstname}}} {{{$admin->lastname}}} (admin)</li>
				@foreach($allguests as $guest)
					<li>{{{$guest}}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@stop