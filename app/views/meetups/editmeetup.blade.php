@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="box">
			<div class="col-lg-6 col-lg-offset-3 text-center">
				<h2>Edit the information for this Social Study</h2>
				{{-- <form class="form-horizontal" method="POST" action="{{{action('MeetupsController@updatemeetup', array($meetup->id))}}}"> --}}
				{{Form::open(array('class' => "form-horizontal", 'method' => "POST", 'action' => array('MeetupsController@updatemeetup', $meetup->id)))}}
					<div class="form-group">
						<label class="control-label" for "title">Title</label>
						<input type="text" class="form-control" name="title" value="{{{$meetup->title}}}">
					</div>
					<div class="form-group">
						<label class="control-label" for "description">Description</label>
						<input type="text" class="form-control" name="description" value="{{{$meetup->description}}}">
					</div>
					<div class="form-group">
						<label class="control-label" for "date">Date</label>
						<input type="text" class="form-control" name="date" value="{{{$meetup->date}}}">
					</div>
					<div class="form-group">
						<label class="control-label" for "time">Time</label>
						<input type="text" class="form-control" name="time" value="{{{$meetup->time}}}">
					</div>
					<div class="form-group">
						<label class="control-label" for "location">Location</label>
						<input type="text" class="form-control" name="location" value="{{{$meetup->location}}}">
					</div>
					<button class="btn btn-edit">Update</button>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@stop