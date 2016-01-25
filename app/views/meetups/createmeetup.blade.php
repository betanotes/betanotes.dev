@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="box">
			<div class="col-lg-6 col-lg-offset-3 text-center">
				<h2>Enter the following information to create a new Social Study!</h2>
				<form class="form-horizontal" method="POST" action="{{{action('MeetupsController@store')}}}">
					<div class="form-group">
						<label class="control-label" for "title">Title</label>
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label class="control-label" for "description">Description</label>
						<input type="text" class="form-control" name="description">
					</div>
					<div class="form-group">
						<label class="control-label" for "date">Date</label>
						<input type="text" class="form-control" name="date">
					</div>
					<div class="form-group">
						<label class="control-label" for "time">Time</label>
						<input type="text" class="form-control" name="time">
					</div>
					<div class="form-group">
						<label class="control-label" for "location">Location</label>
						<input type="text" class="form-control" name="location">
					</div>
					<button class="btn btn-create"><span class="glyphicon glyphicon-plus"></span> Create</button>
				</form>
				<a href="{{{action('MeetupsController@index')}}}"><button class="btn btn-back"><span class="glyphicon glyphicon-chevron-left"><span> Back</button></a>
			</div>
		</div>
	</div>
</div>
@stop