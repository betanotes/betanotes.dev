@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="/css/meetups.css">
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 text-center">
			<img class="meetupimgindex" src="/img/meet.gif">
			<p>Want to create your own study group?</p>
			<a href="{{{action('MeetupsController@createmeetup')}}}"><button class="btn btn-create">Make one</button></a>
		</div>
		<div class="col-md-10">
			<h2 class="text-center">Social Study Index</h2>

			<table class="table table-hover">
				<thead>
					<tr>
						<th>date created</th>
						<th>title</th>
						<th>description</th>
						<th>where</th>
						<th>when</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($allmeetups as $meetup)
					<tr>
						<td>{{{$meetup->created_at->setTimezone('America/Chicago')->format('n-j-Y')}}}</td>
						<td><a class="anchortitle" href="{{{action('MeetupsController@showmeetup', array($meetup->id))}}}">{{{$meetup->title}}}</a></td>
						<td>{{{Str::limit($meetup->description, 20)}}}</td>
						<td>{{{$meetup->location}}}</td>
						<td>{{{$meetup->date}}}, {{{$meetup->time}}}</td>
						<td><a href="{{{action('MeetupsController@showedit', array($meetup->id))}}}"><button class="btn btn-edit">Edit</button></a></td>
						<td><a href="{{{action('MeetupsController@index', array($meetup->id))}}}"><button class="btn btn-danger">Delete</button></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{$allmeetups->links()}}
		</div>
	</div>
</div>
@stop