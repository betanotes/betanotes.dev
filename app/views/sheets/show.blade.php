@extends('layouts.master')

@section('content')

    <div class="container containermargins">
        <div class="row pushdown">

            <div class="col-md-4 text-center">
                <div class="row">
                    <div class="col-xs-12">
                        <img src="/img/sheet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 sheetcolbtns">
                        @if(Auth::user()->id == $sheet->user_id)
                            <a class="btn btn-edit" role="button" href="{{{ action('SheetsController@edit', $sheet->id) }}}">Edit</a>
                            {{ Form::model($sheet, array('action' => array('SheetsController@destroy', $sheet->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                                <button class="btn btn-danger deletebtn" type="submit">Delete</button>
                            {{ Form::close() }}
                        @endif
                    </div>
                    <div class="col-xs-12 sheetcolbtns">
                        <a class="btn btn-back longbutton" role="button" href="{{{ action('SheetsController@index') }}}">Back to Your Sheets</a>
                    </div>
                    <div class="col-xs-12 sheetcolbtns">
                        <a id="infotitle" class="btn btn-standard longbutton">Sheet Info</a>
                        <ul class="list-group infobox">
                            <li class="list-group-item">Posted by {{{ $sheet->user->firstname }}}</li>
                            <li class="list-group-item">Sheet set to {{{ $sheet->public_or_private}}}</li>
                            <li class="list-group-item">Created at {{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                            <li class="list-group-item">Last update {{{ $sheet->updated_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                        </ul>
                    </div>
                    <div class="col-xs-12">
                        <h4>Votes:
                            @if ($sheet->votes()->count() > 0)
                             {{{ $sheet->getVoteScoreAttribute() }}} 
                            @else
                            0
                            @endif
                        </h4>

                        <a href="{{{ action('SheetsController@voteUp', $sheet->id) }}}"  id="voteUp" class="btn btn-standard"><span class="glyphicon glyphicon-triangle-top arrowBig" aria-hidden="true"></span></a>
                        
                        <a href="{{{ action('SheetsController@voteDown', array($sheet->id)) }}}" id="voteDown" class="btn btn-standard"><span class="glyphicon glyphicon-triangle-bottom arrowBig" aria-hidden="true"></span></a>
                    </div>

                </div>
            </div> <!-- end col-md-4 -->

            <div class="col-md-8">
                <h2 class="sheettitle givevocabbottom">{{{ $sheet->title }}}</h2>
                <?php $i = 1; ?>
                @foreach($sheet->lines as $line)
                    <div class="row text-left">
                        <div class="col-xs-5 text-right">
                            <dl>
                                <dt class="clueclick" data-clue="{{{ $i }}}">{{{ $line->clue }}}</dt>
                            </dl> 
                        </div> {{-- end col-xs-5 --}}
                        <div class="col-xs-5 text-left">
                            <dl>
                                <dd class="responseslide" data-response="{{{ $i }}}">{{{ $line->response }}}</dd>
                            </dl> 
                        </div> {{-- end col-xs-5 --}}
                    </div> <!-- end row -->
                    <?php $i = $i + 1; ?>
                @endforeach
                <div class="row givevocabtop">
                    <div class="col-xs-12 text-center">
                        <span class="btn btn-standard longbutton" role="button" id="toggle-btn">Toggle Answers</span>
                        <a class="btn btn-back longbutton" role="button" href="{{{ action('SheetsController@showMatching', $sheet->slug) }}}">Matching Game</a>
                    </div>
                </div>
            </div> <!-- end col-md-8 -->
            <div class="col-md-12 text-center">
                <h4>Comments:</h4>
                <div class="row">
                @foreach($comments as $comment)
                    <div class="col-xs-12">
                        @if((Auth::user()->firstname . ' ' . Auth::user()->lastname) == $comment['commenter'] || Auth::user() == $sheet->user)
                            <a class="btn btn-edit" href="{{{action('CollaborationController@showeditcommentsheet', array($sheet->id, $comment['id']))}}}">Edit</a>
                        @endif
                        <h5 class="commentername">@if($comment['commenter'] != null){{{$comment['commenter']}}} says: @else {{{$sheet->user->firstname . ' ' . $sheet->user->lastname}}} says: @endif</h5>
                        <textarea class="commentarea form-control" type="disabled" disabled rows="3">{{{$comment['comment']}}}</textarea>
                    </div>
                @endforeach
                </div>
                <div class="row">
                    <a class="btn btn-create signmarginbottom" href="{{{action('CollaborationController@showcommentsheet', array($sheet->id))}}}">Comment</a>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->

@stop