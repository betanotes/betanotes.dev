@extends('layouts.master')

@section('content')
	
	<div class="container containermargins">
        <div class="row pushdown">

            <div class="col-md-4 text-center">
                <div class="row">
                    <div class="col-xs-12">
                       <img src="/img/note.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                    </div>
                </div>

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
                        <a class="btn btn-back longbutton" role="button" href="{{{ action('NotesController@index') }}}">Back to Your Notes</a> 
                    </div>
                    <div class="col-xs-12 sheetcolbtns">
                        <a id="infotitle" class="btn btn-standard longbutton">Note Info</a>
                        <ul class="list-group infobox">
                            <li class="list-group-item">Posted by {{{ $note->user->firstname }}}</li>
                            <li class="list-group-item">Note set to {{{ $note->public_or_private}}}</li>
                            <li class="list-group-item">Created at {{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                            <li class="list-group-item">Last update {{{ $note->updated_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                        </ul>
                    </div>
                    <div class="col-xs-12">
                        <h4>Votes:
                            @if ($note->votes()->count() > 0)
                             {{{ $note->getVoteScoreAttribute() }}} 
                            @else
                            0
                            @endif
                        </h4>

                        <a href="{{{ action('NotesController@voteUp', $note->id) }}}"  id="voteUp" class="btn btn-standard"><span class="glyphicon glyphicon-triangle-top arrowBig" aria-hidden="true"></span></a>
                        
                        <a href="{{{ action('NotesController@voteDown', array($note->id)) }}}" id="voteDown" class="btn btn-standard"><span class="glyphicon glyphicon-triangle-bottom arrowBig" aria-hidden="true"></span></a>
                    </div>
                </div>
            </div> <!-- end col-md-4 -->

            <div class="col-md-8">
                <h2 class="text-center">{{ $note->title }}</h2>
                <p class="noteBody">{{ $note->body }}</p>
            </div>
            <div class="col-md-12 text-center">
                <h4>Comments:</h4>
                <div class="row">
                @foreach($comments as $comment)
                    <div class="col-xs-12">
                        @if((Auth::user()->firstname . ' ' . Auth::user()->lastname) == $comment['commenter'] || Auth::user() == $note->user)
                            <a class="btn btn-edit" href="{{{action('CollaborationController@showeditcommentnote', array($note->id, $comment['id']))}}}">Edit</a>
                        @endif
                        <h5 class="commentername">@if($comment['commenter'] != null){{{$comment['commenter']}}} says: @else {{{$note->user->firstname . ' ' . $note->user->lastname}}} says: @endif</h5>
                        <textarea class="commentarea form-control" type="disabled" rows="3" disabled>{{{$comment['comment']}}}</textarea>
                    </div>
                @endforeach
                </div>
                <div class="row">
                    <a class="btn btn-create signmarginbottom" href="{{{action('CollaborationController@showcommentnote', array($note->id))}}}">Comment</a>
                </div>
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
    </div> <!--end container-->

@stop