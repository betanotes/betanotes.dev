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
                        @if(Auth::user()->id == $note->user_id)
                            <a class="btn btn-edit" role="button" href="{{{ action('NotesController@edit', $note->id) }}}">Edit</a>
                            {{ Form::model($note, array('action' => array('NotesController@destroy', $note->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                                <button class="btn btn-danger deletebtn" type="submit">Delete</button>
                            {{ Form::close() }}
                        @endif
                    </div>
                    
                    <div class="col-xs-12 sheetcolbtns">
                        <a class="btn btn-back" role="button" href="{{{ action('NotesController@index') }}}">Back</a> 
                    </div>

                    <h4>Votes:
                        <span id="voteUpCounts"> {{ $note->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $note->voteDownCount() }}</span>
                    </h4>

                    <button  id="voteUp" class="btn btn-standard"
                    data-note-id="{{ $note->id }}"
                    data-vote="1"><span class="glyphicon glyphicon-triangle-top arrowBig" aria-hidden="true"></span></button>
                    
                    <button  id="voteDown" class="btn btn-standard"
                    data-note-id="{{ $note->id }}"
                    data-vote="0"><span class="glyphicon glyphicon-triangle-bottom arrowBig" aria-hidden="true"></span></button>

                </div>
            </div> <!-- end col-md-4 -->

            <div class="col-md-8">
                <h2 class="text-center">{{ $note->title }}</h2>
                <p class="noteBody">{{ $note->body }}</p>

                <h4>Comments:</h4>
                @foreach($comments as $comment)
                <h5>@if($comment['commenter'] != null){{{$comment['commenter']}}} says: @else {{{$note->user->firstname . ' ' . $note->user->lastname}}} says: @endif</h5>
                <textarea class="commentarea" type="disabled" disabled rows="7" cols="50">{{{$comment['comment']}}}</textarea>
                @if((Auth::user()->firstname . ' ' . Auth::user()->lastname) == $comment['commenter'] || Auth::user() == $note->user)
                    <a class="btn btn-edit" href="{{{action('CollaborationController@showeditcommentnote', array($note->id, $comment['id']))}}}">Edit</a>
                @endif
                @endforeach
                <div class="row">
                    <a class="btn btn-create" href="{{{action('CollaborationController@showcommentnote', array($note->id))}}}">Comment</a>
                </div>
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->
    </div> <!--end container-->

@stop