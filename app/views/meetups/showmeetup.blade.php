@extends('layouts.master')


@section('content')

<div class="container containermargins">
    <div class="row meetupname">
        <div class="col-md-4 text-center">

        </div>
        <div class="col-md-4 text-center">
            <h3>{{{$meetup->title}}}</h3>
            <h4>{{{$meetup->description}}}</h4>
            <h5>Where: {{{$meetup->location}}}</h5>
            <h5>When: {{{$meetup->date}}} at {{{$meetup->time}}}</h5>
            @if(Auth::user()->id == $admin->id)
                <p>
                    <a href="{{{action('MeetupsController@showinvite', array($meetup->id))}}}"><button class="btn btn-create">Invite</button></a>
                </p>
                <p>
                    <a href="{{{action('MeetupsController@showedit', array($meetup->id))}}}"><button class="btn btn-edit">Edit</button></a>
                </p>
                <div>
                    {{ Form::model($meetup, array('action' => array('MeetupsController@destroy', $meetup->id), 'method' => 'DELETE', 'class' => 'deleteform', 'data-meetup-id' => $meetup->id)) }}
                    {{ Form::close() }}
                    <button class="btn btn-danger deletermeets" data-id="{{{$meetup->id}}}" data-title = "{{{$meetup->title}}}">Delete</button>
                </div>
            @endif
            <p>
                <a href="{{{action('MeetupsController@index')}}}"><button class="btn btn-back longbutton">Back to Your Groups</button></a>
            </p>
            <h4>Votes: <span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></h4>

            <button  id="voteUp" class="btn btn-standard" data-meetup-id="{{ $meetup->id }}" data-vote="1"> <span class="glyphicon glyphicon-triangle-top arrowBig" aria-hidden="true"></button>
                
            <button  id="voteDown" class="btn btn-standard" data-meetup-id="{{ $meetup->id }}" data-vote="0"> <span class="glyphicon glyphicon-triangle-bottom arrowBig" aria-hidden="true"></span></button>
        </div>
        <div class="col-md-4 text-center">
            <h3>People attending this Social Study</h3>
            <ul class="userpageslist">
                <li><img class="meetupimg" src="../{{{$admin->image_url}}}">{{{$admin->firstname}}} {{{$admin->lastname}}} (admin)</li>
                @foreach($allguests as $guest)
                    <li class="attendeeslist"><img class="meetupimg" src="../{{{$guest['picture']}}}">{{{$guest['name']}}} (guest)</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            
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
                        <button class="btn btn-danger" data-id="{{{$comment['id']}}}" class="deletercomments" data-author="{{{$comment['commenter']}}}">Delete</button>
                    {{Form::close()}}</li>
                        @if(Auth::user()->id == $comment['commenterid'])
                            <a href="{{{action('MeetupsController@showeditcomment', array($comment['id']))}}}"><button class="btn btn-edit">Edit</button></a>
                        @endif
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
    
    </script>
@stop