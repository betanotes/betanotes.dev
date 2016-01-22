@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter a comment for this Social Study!</h3>
			<form class="form-horizontal" method="POST" action="{{{action('MeetupsController@postcomment', array($meetup->id))}}}">
				<div class="form-group">
					<label class="control-label" for "comment">Comment Body</label>
					<textarea type="text" class="form-control" name="comment"></textarea>
					<button class="btn btn-primary">Post a comment</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop