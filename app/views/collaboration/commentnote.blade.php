@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter your commentary</h3>
			<form class="form-horizontal" method="POST" action="{{{action('CollaborationController@commentnote', array($note->id))}}}">
				<div class="form-group">
					<label class="control-label" for "comment">Commentary</label>
					<textarea type="text" class="form-control" name="comment"></textarea>
					<button class="btn btn-create">Comment</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop