@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter a description of yourself in 140 characters or less</h3>
			{{Form::open(array('class' => 'form-horizontal', 'method' => 'POST', 'action' => array('UsersController@postdescription')))}}
				<div class="form-group">
					<label class="control-label" for "description">Description</label>
					<input class="form-control" type="text" name="description">
				</div>
				<button class="btn btn-create">Post</button>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop