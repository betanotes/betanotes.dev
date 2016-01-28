@extends('layouts.master')

@section('content')
	<div class="error" role="alert">
		<div class="error">{{{$errors->first('firstname', ':message')}}}</div>
		<div>{{{$errors->first('lastname', ':message')}}}</div>
		<div>{{{$errors->first('email', ':message')}}}</div>
		<div>{{{$errors->first('affiliation', ':message')}}}</div>
		<div>{{{$errors->first('break_type', ':message')}}}</div>
	</div>

<div class="container containermargins">
	<div class="row">
		<div class="col-md-12 text-center">
			<h3>Edit whatever fields you want!</h3>
		</div>
		<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 text-center">
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
					<label class="control-label" for "email">Email</label>
					<input type="text" class="form-control" name="email" value="{{{Auth::user()->email}}}">
				</div>
				<div class="form-group">
					<label class="control-label" for "affiliation">Affiliation (ex. Jay High School, SampleCorp)</label>
					<input type="text" class="form-control" name="affiliation" value="{{{Auth::user()->affiliation}}}">
				</div>
				<div class="form-group">
					<label class="control-label" for "age">Age (Optional)</label>
					<input type="text" class="form-control" name="age" value="{{{Auth::user()->age}}}">
				</div>
				<div class="form-group">
					<label class="control-label" for "description">Description (Optional: 140 characters or less)</label>
					<textarea class="form-control" type="text" name="description">{{{Auth::user()->description}}}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label" for "image_url">Profile Picture (Optional)</label>
					<input type="file" class="form-control" name="image_url">
				</div>
				<div class="form-group">
					<label class="control-label" for "password">Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label class="control-label" for "confirm">Confirm Password</label>
					<input type="password" class="form-control" name="confirm">
				</div>
				<button class="btn btn-edit">Update</button>
		{{Form::close()}}
		</div> <!-- end col-md-8 -->
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1 text-center">
			<hr>
			<h4>Delete Your Social Notes Profile (This is permanent.)</h4>
			{{Form::model(Auth::user(), array('action' => array('UsersController@destroy', Auth::user()->id), 'method' => 'DELETE', 'class' => 'deleteform', 'data-user-id' => Auth::user()->id)) }}
	        {{Form::close()}}
	        <button class="btn btn-danger deleter" data-id="{{{Auth::user()->id}}}" data-name="{{{Auth::user()->firstname}}}">Delete</button>
        </div>
	</div>
</div>

@stop