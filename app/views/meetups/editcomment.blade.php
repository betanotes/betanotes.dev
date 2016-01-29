@extends('layouts.master')

@section('content')

<div class="container containermargins">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Edit Your Comment</h3>
			{{Form::open(array('method' => "POST", 'action' => array('MeetupsController@editcomment', $comment->id)))}}
				<div class="form-group">
					<label class="control-label" for "comment"></label>
					<textarea type="text" class="form-control commentarea" name="comment" rows="3">{{{$comment->comment}}}</textarea>
					<button class="btn btn-edit">Update</button>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>

@stop