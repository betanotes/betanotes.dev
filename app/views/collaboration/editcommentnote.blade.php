@extends('layouts.master')

@section('content')

<div class="container containermargins">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3>Edit Your Comment</h3>
			{{Form::open(array('action' => array('CollaborationController@editcommentnote', $note->id, $comment->id)))}}
				<div class="form-group">
					<label class="control-label" for "comment"></label>
					<textarea type="text" class="commentarea form-control" rows="3" name="comment">{{{$comment->comment}}}</textarea>
					<button class="btn btn-edit">Update</button>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>

@stop