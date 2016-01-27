@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter a comment for this Social Study (must be between 1 and 400 characters)!</h3>
			{{-- <form class="form-horizontal" method="POST" action="{{{action('MeetupsController@postcomment', array($meetup->id))}}}"> --}}
			{{Form::open(array('class' => 'form-horizontal', 'method' => 'POST', 'action' => array('MeetupsController@postcomment', $meetup->id)))}}
				<div class="form-group">
					<label class="control-label" for "comment">Comment Body</label>
					<textarea type="text" class="form-control" name="comment"></textarea>
					<button class="btn btn-create">Post</button>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop