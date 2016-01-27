@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3 text-center">
			<img class="profilepic" src="{{{$user->image_url}}}">
			<div class="aboutMe">
				<h3>Age: 27{{{ $user->age }}}</h3>
				<h2>{{{ $user->affiliation }}}</h2>
				<p> About me section. It can only be 140 characters, so make sure you get the point across! {{{ $user->description }}} </p>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>edit or delete profile</th>
						{{-- <th>delete</th> --}}
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="{{{action('UsersController@showedit')}}}"><button class="btn btn-edit">Edit</button></a>
						{{Form::model($user, array('action' => array('UsersController@destroy', $user->id), 'method' => 'DELETE', 'class' => 'deleteform', 'data-user-id' => $user->id)) }}
						{{Form::close()}}
						<button class="btn btn-danger deleter" data-id="{{{$user->id}}}" data-name="{{{$user->firstname}}}">Delete</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-md-3 col-sm-3 col-xs-3 text-center">
			<h3>My Top Notes</h3>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>votes</th>
						<th>title</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>

		<div class="col-md-3 col-sm-3 col-xs-3 text-center">
			<h3>My Top Sheets</h3>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>votes</th>
						<th>title</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>

		<div class="col-md-3 col-sm-3 col-xs-3 text-center">
			<h3>My Top Study Groups</h3>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>votes</th>
						<th>title</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>
@stop
@section('bottom-script')
<script>
	"Use Strict";
	$(".deleter").click(function(event) {
		event.preventDefault();
		var userid = $(this).data("id");
		var username = $(this).data("name");
		if(confirm("Are you sure you want to leave Social Notes forever, " + username + "?")) {

			$('form[data-user-id="' + userid + '"]').submit();
		}
	});
</script>
@stop
</body>
</html>