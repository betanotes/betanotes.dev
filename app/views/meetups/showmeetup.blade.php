@extends('layouts.master')
<link rel="stylesheet" type="text/css" href="/css/meetups.css">
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-14 text-center">
			<div class="meetupname">
				<h3>{{{$meetup->title}}}</h3>
			<h4>{{{$meetup->description}}}</h4>
			<h5>Where: {{{$meetup->location}}}</h5>
			<h5>When: {{{$meetup->date}}} at {{{$meetup->time}}}</h5>
			@if(Auth::user()->id == $admin->id)
			<p>
				<a href="{{{action('MeetupsController@showinvite', array($meetup->id))}}}"><button class="btn btn-create"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Invite</button></a>
			</p>
			<p>
				<a href="{{{action('MeetupsController@showedit', array($meetup->id))}}}"><button class="btn btn-edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button></a>
			</p>
			@endif
			<p>
				<a href="{{{action('MeetupsController@index')}}}"><button class="btn btn-back"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Index</button></a>
			</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center">
			<div class="col-lg-6">
				<h3>People attending this Social Study:</h3>
				<ul class="userpageslist">
					<li><img class="meetupimg" src="../{{{$admin->image_url}}}">{{{$admin->firstname}}} {{{$admin->lastname}}} (admin)</li>
					@foreach($allguests as $guest)
						<li class="attendeeslist"><img class="meetupimg" src="../{{{$guest['picture']}}}">{{{$guest['name']}}} (guest)</li>
					@endforeach
				</ul>
			</div>
			<div class="col-lg-6">
				<h3>Comments</h3>
				<ul class="userpageslist">
					@foreach($allcomments as $comment)
				{{-- Says who wrote the comment --}}
					<li class="individualcomment"><img class="meetupimg" src="{{{$comment['picture']}}}">{{{$comment['commenter']}}} says:</li>

				{{-- Comment itself --}}
					<textarea class="commentarea" type="disabled" disabled rows="7" cols="50">{{{$comment['comment']}}}</textarea>

				{{-- If you are the admin or the author of the post, you can delete the comment --}}
					@if(Auth::user()->id == $admin->id || Auth::user()->id == $comment['commenterid'])

				{{-- Delete --}}
					<li>{{Form::model($comment, array('action' => array('MeetupsController@deletecomment', $comment['id']), 'method' => 'DELETE', 'class' => 'deleteform', 'data-comment-id' => $comment['id']))}}
						<button class="btn btn-danger" data-id="{{{$comment['id']}}}" class="deleter" data-author="{{{$comment['commenter']}}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
					{{Form::close()}}</li>
					@endif
					@endforeach
				</ul>

				<div class="text-center">
					{{$comments->links()}}
				</div>
				<a href="{{{action('MeetupsController@commentform', array($meetup->id))}}}"><button class="btn btn-create">Comment</button></a>
			</div>
		</div>
	</div>
			{{-- Comments
			<ul>
				@foreach($comments as $comment)
				<li>{{{$comment->comment}}}</li>
				@endforeach
			</ul> --}}
</div>
@stop
@section('bottom-script')
	<script>
	"Use Strict";
	$(".deleter").click(function(event) {
		event.preventDefault();

		var commentid = $(this).data("id");
		var commenter = $(this).data("author");
		console.log(commentid);
		if(confirm("Are you sure you want to delete this comment?")) {
			$('form[data-comment-id="' + commentid + '"}').submit();
		}
	});
	</script>
@stop