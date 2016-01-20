@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter the following information to sign up!</h3>
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
					<label class="control-label" for "break_type">What do you like to do when you take a break?</label>
					<input type="text" class="form-control" name="break_type">
				</div>
				<div class="form-group">
					<label class="control-label" for "password">Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label class="control-label" for "confirm">Confirm Password</label>
					<input type="password" class="form-control" name="confirm">
				</div>
				<div class="form-group">
					<label class="control-label" for "image_url">Profile Picture</label>
					<input type="file" class="form-control" name="image_url">
				</div>
				<button class="btn btn-primary">Sign Up!</button>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop
</body>
</html>