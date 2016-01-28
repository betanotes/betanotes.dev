@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-2 text-center">
                <img src="/img/meet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <a class="btn btn-create" href="{{{action('MeetupsController@createmeetup')}}}"> Create Study Group</a>
            </div>

            <div class="col-md-10">
                <h2 class="text-center">Your Social Study Groups</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th>title</th>
                            <th>where</th>
                            <th>when</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allmeetups as $meetup)
                        <tr>
                            <td><span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></td>
                            <td><a class="anchortitle" href="{{{action('MeetupsController@showmeetup', array($meetup->id))}}}">{{{ Str::limit($meetup->title, 40) }}}</a></td>
                            <td>{{{ Str::limit($meetup->location, 20) }}}</td>
                            <td>{{{ Str::limit($meetup->date, 15) }}} at {{{ Str::limit($meetup->time, 15) }}}</td>
                            <td><a href="{{{action('MeetupsController@showedit', array($meetup->id))}}}" class="btn btn-edit">Edit</a></td>
                            {{-- The Delete Button --}}
                            <td>
                                {{ Form::model($meetup, array('action' => array('MeetupsController@destroy', $meetup->id), 'method' => 'DELETE', 'class' => 'deleteform', 'data-meetup-id' => $meetup->id)) }}
                                {{ Form::close() }}
                                <button class="btn btn-danger deleter" data-id="{{{$meetup->id}}}" data-title = "{{{$meetup->title}}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        @foreach($allgoing as $moremeetup)
                        <tr>
                            <td><span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></td>
                            <td><a class="anchortitle" href="{{{action('MeetupsController@showmeetup', array($moremeetup['id']))}}}">{{{$moremeetup['title']}}}</a></td>
                            <td>{{{ Str::limit($moremeetup['location'], 20)}}}</td>
                            <td>{{{ Str::limit($moremeetup['date'], 15)}}} at {{{ Str::limit($moremeetup['time'], 15)}}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $allmeetups->links() }}

            </div>
        </div>
    </div>
@stop

@section('bottom-script')
    <script>
        "Use Strict";
        $(".deleter").click(function(event) {
            event.preventDefault();
            var meetupid = $(this).data("id");
            var meetuptitle = $(this).data("title");
            if(confirm("Are you sure you want to delete this Social Study: " + meetuptitle + "?")) {
                
                $('form[data-meetup-id="' + meetupid + '"]').submit();
            }
        });
    </script>
@stop