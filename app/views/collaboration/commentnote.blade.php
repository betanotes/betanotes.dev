@extends('layouts.master')

@section('content')

<div class="container containermargins">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter Your Comment</h3>
			{{Form::open(array('action' => array('CollaborationController@commentnote', $note->id)))}}
				<div class="form-group">
					<label class="control-label" for "comment"></label>
					<textarea type="text" class="commentarea form-control" rows="3" name="comment"></textarea>
					<button class="btn btn-create">Comment</button>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>

@stop