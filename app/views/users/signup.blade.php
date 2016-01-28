@extends('layouts.master')

@section('content')

	@if($errors != '') 
		<div class="error" role="alert">
			<div class="error">{{{$errors->first('firstname', ':message')}}}</div>
			<div>{{{$errors->first('lastname', ':message')}}}</div>
			<div>{{{$errors->first('email', ':message')}}}</div>
			<div>{{{$errors->first('affiliation', ':message')}}}</div>
			<div>{{{$errors->first('break_type', ':message')}}}</div>
			<div>{{{$errors->first('password', ':message')}}}</div>
		</div>
	@endif

<div class="container containermargins">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3 col-xs-10 col-xs-offset-1 text-center">
			<h3>Sign Up for a Social Notes Account!</h3>
			{{Form::open(array('class' => "form-horizontal", 'method' => 'POST', 'action' => 'UsersController@store', 'files' => 'true'))}}
				<div class="form-group">
					<label class="control-label" for "firstname">First Name</label>
					<input type="text" class="form-control" name="firstname">
				</div>
				<div class="form-group">
					<label class="control-label" for "lastname">Last Name</label>
					<input type="text" class="form-control" name="lastname">
				</div>
				<div class="form-group">
					<label class="control-label" for "email">Email</label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label class="control-label" for "affiliation">Affiliation (ex. Jay High School, SampleCorp)</label>
					<input type="text" class="form-control" name="affiliation">
				</div>
				<div class="form-group">
					<label class="control-label" for "age">Age (Optional)</label>
					<input type="text" class="form-control" name="age">
				</div>
				<div class="form-group">
					<label class="control-label" for "description">Description (Optional: 140 characters or less)</label>
					<textarea class="form-control" type="text" name="description"></textarea>
				</div>
				<div class="form-group">
					<label class="control-label" for "image_url">Profile Picture (Optional)</label>
					<input type="file" name="image_url" class="form-control">
				</div>
				<div class="form-group">
					<label class="control-label" for "password">Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label class="control-label" for "confirm">Confirm Password</label>
					<input type="password" class="form-control" name="confirm">
				</div>
				<button class="btn btn-standard deleter">Sign Up</button>
			{{Form::close()}}
		</div>
	</div>
</div>

@stop