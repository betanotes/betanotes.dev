@extends('layouts.master')

@section('content')
	
	<div class="container">
        <div class="row pushdown">

            <div class="col-md-4 text-center">
               <img src="/img/note.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <h2 class="notetitle">{{{ $note->title }}}</h2>
                <h4 id="infotitle">Note Info</h4>
                <ul class="list-group infobox">
                    <li class="list-group-item">Posted by {{{ $note->user->firstname }}}</li>
                    <li class="list-group-item">Note set to {{{ $note->public_or_private}}}</li>
                    <li class="list-group-item">Created at {{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                    <li class="list-group-item">Last update {{{ $note->updated_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                </ul>
                <div class="row">
                    <div class="col-xs-12 sheetcolbtns">
                        <a class="btn btn-edit" role="button" href="{{{ action('NotesController@edit', $note->id) }}}">Edit</a>
                        {{ Form::model($note, array('action' => array('NotesController@destroy', $note->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                            <button class="btn btn-danger deletebtn" type="submit">Delete</button>
                        {{ Form::close() }}
                    </div>
                    <div class="col-xs-12 sheetcolbtns">
                        <a class="btn btn-back" role="button" href="{{{ action('NotesController@index') }}}">Back</a>  
                    </div>

                    
                    <button  id="voteUp" class="glyphicon glyphicon-chevron-up"
                   
                    data-note-id="{{ $note->id }}"
                    data-vote="1">VoteUp</button>
                    
                    <span id="voteUpCounts"> {{ $note->voteUpCount() }}</span>

                    <button  id="voteDown" class="glyphicon glyphicon-chevron-down"

                    data-note-id="{{ $note->id }}"
                    data-vote="0">VoteDown</button>
            
                    <span id="voteDownCounts">{{ $note->voteDownCount() }}</span>

                </div>
            </div> <!-- end col-md-4 -->

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