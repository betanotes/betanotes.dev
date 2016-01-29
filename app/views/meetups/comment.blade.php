@extends('layouts.master')

@section('content')

<div class="container containermargins">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3>Enter Your Comments</h3>
			{{Form::open(array('method' => 'POST', 'action' => array('MeetupsController@postcomment', $meetup->id)))}}
				<div class="form-group">
					<label class="control-label" for "comment"></label>
					<textarea type="text" class="form-control commentarea" name="comment" rows="3"></textarea>
					<button class="btn btn-create signmarginbottom">Comment</button>
				</div>
			{{Form::close()}}
		</div>
	</div>
</div>

@stop