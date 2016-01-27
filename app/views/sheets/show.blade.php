@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row pushdown">

            <div class="col-md-4 text-center">
                <img src="/img/sheet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <h2 class="sheettitle">{{{ $sheet->title }}}</h2>
                <h4 id="infotitle">Sheet Info</h4>
                <ul class="list-group infobox">
                    <li class="list-group-item">Posted by {{{ $sheet->user->firstname }}}</li>
                    <li class="list-group-item">Sheet set to {{{ $sheet->public_or_private}}}</li>
                    <li class="list-group-item">Created at {{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                    <li class="list-group-item">Last update {{{ $sheet->updated_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                </ul>
                <div class="row">
                    <div class="col-xs-12 sheetcolbtns">
                        <a class="btn btn-edit" role="button" href="{{{ action('SheetsController@edit', $sheet->id) }}}">Edit</a>
                        {{ Form::model($sheet, array('action' => array('SheetsController@destroy', $sheet->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                            <button class="btn btn-danger deletebtn" type="submit">Delete</button>
                        {{ Form::close() }}
                    </div>
                    <div class="col-xs-12 sheetcolbtns">
                        <a class="btn btn-back" role="button" href="{{{ action('SheetsController@index') }}}">Back</a>
                        <span class="btn btn-standard" role="button" id="toggle-btn">Toggle</span>
                        <a class="btn btn-success" href="{{{action('CollaborationController@showinvitesheet', array($sheet->id))}}}">Invite</a>

                        <h4>Votes:
                            <span id="voteUpCounts"> {{ $sheet->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $sheet->voteDownCount() }}</span>
                        </h4>

                        <button  id="voteUp" class="btn btn-standard" data-sheet-id="{{ $sheet->id }}" data-vote="1"><span class="glyphicon glyphicon-triangle-top arrowBig" aria-hidden="true"></span></button>
                        
                        <button  id="voteDown" class="btn btn-standard" data-sheet-id="{{ $sheet->id }}" data-vote="0"><span class="glyphicon glyphicon-triangle-bottom arrowBig" aria-hidden="true"></span></button>

                        <h4>People collaborating on this sheet:</h4>
                        <ul>
                            @foreach($collaborators as $guest)
                            <li>{{{$guest}}}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div> <!-- end col-md-4 -->

            <div class="col-md-8 pushsheetlistdown">
                <?php $i = 1; ?>
                @foreach($sheet->lines as $line)
                    <div class="row text-left">
                        <div class="col-xs-4 text-right">
                            <dl>
                                <dt class="clueclick" data-clue="{{{ $i }}}">{{{ $line->clue }}}</dt>
                            </dl> 
                        </div> {{-- end col-xs-6 --}}
                        <div class="col-xs-7 text-left">
                            <dl>
                                <dd class="responseslide" data-response="{{{ $i }}}">{{{ $line->response }}}</dd>
                            </dl> 
                        </div> {{-- end col-xs-6 --}}
                    </div> <!-- end row -->
                    <?php $i = $i + 1; ?>
                @endforeach
            </div> <!-- end col-md-8 -->
            <h4>Comments:</h4>
                @foreach($comments as $comment)
                <h5>@if($comment['commenter'] != null){{{$comment['commenter']}}} says: @else {{{$sheet->user->firstname . ' ' . $sheet->user->lastname}}} says: @endif</h5>
                <textarea class="commentarea" type="disabled" disabled rows="7" cols="50">{{{$comment['comment']}}}</textarea>
                @if((Auth::user()->firstname . Auth::user()->lastname) == $comment['commenter'] || Auth::user() == $sheet->user)
                    <a class="btn btn-edit" href="{{{action('CollaborationController@showeditcommentsheet', array($sheet->id, $comment['id']))}}}">Edit</a>
                @endif
                @endforeach
                <div class="row">
                    <a class="btn btn-create" href="{{{action('CollaborationController@showcommentsheet', array($sheet->id))}}}">Comment</a>
                </div>
        </div> <!-- end row -->
    </div> <!-- end container -->

@stop