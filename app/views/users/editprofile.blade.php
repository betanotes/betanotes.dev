@extends('layouts.master')
@section('content')
	<div class="error" role="alert">
		<div class="error">{{{$errors->first('firstname', ':message')}}}</div>
		<div>{{{$errors->first('lastname', ':message')}}}</div>
		<div>{{{$errors->first('email', ':message')}}}</div>
		<div>{{{$errors->first('affiliation', ':message')}}}</div>
		<div>{{{$errors->first('break_type', ':message')}}}</div>
	</div>

<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Edit whatever fields you want!</h3>
		</div>
		{{Form::open(array('class' => 'form-horizontal', 'method' => 'POST', 'action' => 'UsersController@update', 'files' => 'true'))}}
			<div class="form-group">
					<label class="control-label" for "firstname">First Name</label>
					<input type="text" class="form-control" name="firstname" value="{{{Auth::user()->firstname}}}">
				</div>
				<div class="form-group">
					<label class="control-label" for "lastname">Last Name</label>
					<input type="text" class="form-control" name="lastname" value="{{{Auth::user()->lastname}}}">
				</div>
				<div class="form-group">
					<label class="control-label" for "age">Age</label>
					<input type="text" class="form-control" name="age" value="{{{Auth::user()->age}}}">
				</div>
				<div class="form-group">
					<label class="control-label" for "email">Email</label>
					<input type="text" class="form-control" name="email" value="{{{Auth::user()->email}}}">
				</div>
				<div class="form-group">
					<label class="control-label" for "affiliation">Affiliation (ex. Jay High School, SampleCorp)</label>
					<input type="text" class="form-control" name="affiliation" value="{{{Auth::user()->affiliation}}}">
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
					<label class="control-label" for "description">Description</label>
					<textarea class="form-control" type="text" name="description">{{{Auth::user()->description}}}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label" for "image_url">Profile Picture</label>
					<input type="file" class="form-control" name="image_url">
				</div>
				<button class="btn btn-edit">Update</button>
		{{Form::close()}}
	</div>
</div>
@stop
</body>
</html>