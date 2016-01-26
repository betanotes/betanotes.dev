@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Edit your Input</h3>
			<form class="form-horizontal" method="POST" action="{{{action('CollaborationController@editcommentsheet', array($sheet->id, $comment->id))}}}">
				<div class="form-group">
					<label class="control-label" for "comment">Input</label>
					<textarea type="text" class="form-control" name="comment">{{{$comment->comment}}}</textarea>
					<button class="btn btn-edit">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop