@extends('layouts.master')

@section('content')
	
	<div class="container pushdown">
        <div class="row">
            <div class="col-md-3 text-center">
                <h4 id="infotitle">Note Info</h4>
                <ul class="list-group infobox">
                    <li class="list-group-item">Posted by {{{ $note->user->firstname }}}</li>
                    <li class="list-group-item">Note set to {{{ $note->public_or_private}}}</li>
                    <li class="list-group-item">Created at {{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                    <li class="list-group-item">Last update {{{ $note->updated_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                </ul>
                	<p>
                		<a class="btn btn-default" role="button" href="{{{ action('NotesController@edit', $note->slug) }}}">Edit this note</a>
                	</p>
                    <p>
                    {{ Form::model($note, array('action' => array('NotesController@destroy', $note->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    {{ Form::close() }}
                    </p>    
            </div>
            <div class="col-md-8">
                <h2 class="text-center">{{ $note->title }}</h2>
                <p class="noteBody">{{ $note->body }}</p>
                
                <a href="{{{ action('NotesController@index') }}}">Back to Notes Index</a>
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->
    </div> <!--end container-->

@stop
		

	{{-- {{ Form::open(array('action' => array('NotesController@destroy', $note->id), 'method' => 'DELETE')) }}
		<button type="submit" class="btn btn-danger">Delete Note</button>
	{{ Form::close() }} --}}