@extends('layouts.master')


@section('content')

<div class="container containermargins">
    <div class="row meetupname">
        <div class="col-md-4 text-center">
            <div class="row">
                <div class="col-xs-12">
                   <img src="/img/meet.gif" class="img-responsive img-inline img-margintop meetshowimg" alt="Responsive image">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 sheetcolbtns">
                    @if(Auth::user()->id == $admin->id)
                        <a href="{{{action('MeetupsController@showedit', array($meetup->id))}}}"><button class="btn btn-edit">Edit</button></a>
                        {{ Form::model($meetup, array('action' => array('MeetupsController@destroy', $meetup->id), 'method' => 'DELETE', 'class' => 'deleteform', 'data-meetup-id' => $meetup->id)) }}
                        {{ Form::close() }}
                        <button class="btn btn-danger deletermeets" data-id="{{{$meetup->id}}}" data-title = "{{{$meetup->title}}}">Delete</button>
                    @endif
                </div>
                <div class="col-xs-12 sheetcolbtns">
                    <a href="{{{action('MeetupsController@index')}}}"><button class="btn btn-back longbutton">Back to Your Groups</button></a>
                </div>
                <div class="col-xs-12">
                    <h4>Votes: <span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></h4>

                    <button  id="voteUp" class="btn btn-standard" data-meetup-id="{{ $meetup->id }}" data-vote="1"> <span class="glyphicon glyphicon-triangle-top arrowBig" aria-hidden="true"></button>
                
                    <button  id="voteDown" class="btn btn-standard" data-meetup-id="{{ $meetup->id }}" data-vote="0"> <span class="glyphicon glyphicon-triangle-bottom arrowBig" aria-hidden="true"></span></button>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <h2>{{{$meetup->title}}}</h2>
            <h4>{{{$meetup->description}}}</h4>
            <h4>Where: {{{$meetup->location}}}</h4>
            <h4>When: {{{$meetup->date}}} at {{{$meetup->time}}}</h4>
            @if(Auth::user()->id == $admin->id)
                <a href="{{{action('MeetupsController@showinvite', array($meetup->id))}}}"><button class="btn btn-create">Invite</button></a>
            @endif
        </div>
        <div class="col-md-4 text-center">
            <h3>Attending this Social Study</h3>
            <ul class="userpageslist">
                <li><img class="meetupimg" src="../{{{$admin->image_url}}}">{{{$admin->firstname}}} {{{$admin->lastname}}} (admin)</li>
                @foreach($allguests as $guest)
                    <li class="attendeeslist"><img class="meetupimg" src="../{{{$guest['picture']}}}">{{{$guest['name']}}} (guest)</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center">
            
                <h3>Comments</h3>
                <div class="row">
                
                    @foreach($allcomments as $comment)
                    <div class="col-xs-12">
                    {{-- Says who wrote the comment --}}
                    {{-- If you are the admin or the author of the post, you can delete the comment --}}
                        @if(Auth::user()->id == $admin->id || Auth::user()->id == $comment['commenterid'])
                            {{-- Delete --}}
                            {{Form::model($comment, array('action' => array('MeetupsController@deletecomment', $comment['id']), 'method' => 'DELETE', 'class' => 'deleteform', 'data-comment-id' => $comment['id']))}}
                                <button class="btn btn-danger" data-id="{{{$comment['id']}}}" class="deletercomments" data-author="{{{$comment['commenter']}}}">Delete</button>
                            {{Form::close()}}
                            @if(Auth::user()->id == $comment['commenterid'])
                                <a href="{{{action('MeetupsController@showeditcomment', array($comment['id']))}}}"><button class="btn btn-edit">Edit</button></a>
                            @endif
                        @endif
                    <h5 class="individualcomment commentername">{{{$comment['commenter']}}} says:</h5>

                    {{-- Comment itself --}}
                    <textarea class="commentarea form-control" type="disabled" disabled rows="3">{{{$comment['comment']}}}</textarea>

                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {{$comments->links()}}
                </div>
                <div class="row">
                    <div class="col-xs-12"></div>
                        <a href="{{{action('MeetupsController@commentform', array($meetup->id))}}}"><button class="btn btn-create signmarginbottom">Comment</button></a>
                </div>

        </div>
    </div>

</div>

@stop