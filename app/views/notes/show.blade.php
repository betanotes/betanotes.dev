@extends('layouts.master')

@section('content')
	
	@foreach($notes as $note)
			<p>Notes Created:	{{{ $note->created_at->setTimezone('America/Chicago')->format('l, F jS, Y @ h:i A') }}} </p>
			<h2>
				<a href="{{{ action('NotesController@show', ($note->title)) }}}">{{{ $note->title }}}</a>
			</h2>
			<p class="blogBody">{{{ $note->body }}}</p>	
		@endforeach

{{ Form::open(array('action' => array('NotesController@destroy', $note->id), 'method' => 'DELETE')) }}

	
	<button type="submit" class="btn btn-danger">Delete Note</button>

{{ Form::close() }}

@stop