@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<h3>Enter your information to log in!</h3>
			<form class="form-horizontal text-center col-lg-4 col-lg-offset-4" method="POST" action="{{{action('UsersController@dologin')}}}">
				<div class="form-group">
					<label class="control-label" for "email">Email</label>
					<input type="text" class="form-control" name="email">
				</div>
				<div class="form-group">
					<label class="control-label" for "password">Password</label>
					<input type="password" class="form-control" name="password">
				</div>
				<button class="btn btn-standard"><span class="glyphicon glyphicon-log-in"></span> Log In!</button>
			</form>
		</div>
	</div>
</div>
@stop
</body>
</html>