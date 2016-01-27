@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Edit your comment</h3>
			{{-- <form class="form-horizontal" method="POST" action="{{{action('MeetupsController@editcomment', array($comment->id))}}}"> --}}
			{{Form::open(array('class' => "form-horizontal", 'method' => "POST", 'action' => array('MeetupsController@editcomment', $comment->id)))}}
				<div class="form-group">
					<label class="control-label" for "comment">Comment Body</label>
					<textarea type="text" class="form-control" name="comment">{{{$comment->comment}}}</textarea>
					<button class="btn btn-edit">Update</button>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop