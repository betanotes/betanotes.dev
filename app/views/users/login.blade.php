@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter your information to log in!</h3>
			{{Form::open(array('action' => 'UsersController@dologin'))}}
				<div class="form-group">
					<label class="control-label" for "email">Email</label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label class="control-label" for "password">Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<button class="btn btn-standard">Log In!</button>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop
</body>
</html>