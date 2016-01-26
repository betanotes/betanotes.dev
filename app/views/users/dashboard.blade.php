@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 text-center">
			<img class="profilepic" src="{{{$user->image_url}}}">
		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			{{-- <h2 class="text-center">Hello, {{{$user->firstname}}}</h2> --}}
			<table class="table table-hover">
				<thead>
					<tr>
						<th>your name</th>
						<th>your email</th>
						<th>your affiliation</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{{$user->firstname}}} {{{$user->lastname}}}</td>
						<td>{{{$user->email}}}</td>
						<td>{{{$user->affiliation}}}</td>
						<td><a href="{{{action('UsersController@showedit')}}}"><button class="btn btn-edit">Edit</button></a></td>
						<td>
							{{Form::model($user, array('action' => array('UsersController@destroy', $user->id), 'method' => 'DELETE', 'class' => 'deleteform', 'data-user-id' => $user->id)) }}
							{{Form::close()}}
							<button class="btn btn-danger deleter" data-id="{{{$user->id}}}" data-name="{{{$user->firstname}}}">Delete</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row aboutMe">
		<div class="col-md-2 text-center">
			<h3>27 years old</h3>
			<p> This section is all about me. It is who I am and where I am from all in 140 characters or less. This is where you show off a bit.</p>
		</div>
		<div class="col-md-10 col-sm-10 col-xs-10">
			{{-- <h2 class="text-center">Hello, {{{$user->firstname}}}</h2> --}}
			<table class="table table-hover">
				<thead>
					<tr>
						<th>date created</th>
						<th>title</th>
						<th>privacy setting</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($notes as $note)
                        <tr>
                            <td>{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                            <td><a class="anchortitle" href="{{ action('NotesController@show', ($note->slug)) }}">{{{ Str::limit($note->title, 30) }}}</a></td>
                            <td>{{{ $note->public_or_private }}}</td>
                            <td><a class="btn btn-edit" role="button" href="{{{ action('NotesController@edit', $note->slug) }}}">Edit</a></td>
                            <td>{{ Form::model($note, array('action' => array('NotesController@destroy', $note->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                                <button class="btn btn-danger deletebtn" type="submit">Delete</button>
                            {{ Form::close() }}</td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
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