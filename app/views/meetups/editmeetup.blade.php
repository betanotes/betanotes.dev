@extends('layouts.master')

@section('content')
<div class="container containermargins">
	<div class="row">
		<div class="col-md-2 text-center">
            <img src="/img/meet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
            <a href="{{{action('MeetupsController@index')}}}"><button class="btn btn-back">Back to Your Groups</button></a>
        </div>

			<div class="col-md-8">
				<h2 class="text-center">Edit Your Social Study</h2>
				{{Form::open(array('method' => "POST", 'action' => array('MeetupsController@updatemeetup', $meetup->id)))}}
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
					<button class="btn btn-edit signmarginbottom">Update</button>
				{{Form::close()}}
			</div>
	</div>
</div>
@stop