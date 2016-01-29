@extends('layouts.master')

@section('content')
    <div class="container containermargins">
        <div class="row">

            <div class="col-md-2 text-center">
                <img src="/img/meet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <a class="btn btn-create" href="{{{action('MeetupsController@createmeetup')}}}">Create New Study Group</a>
            </div>

            <div class="col-md-9">
                <h2 class="text-center">Your Social Study Groups</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th>title</th>
                            <th class="hidden-sm hidden-xs">where</th>
                            <th class="hidden-sm hidden-xs">when</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($allmeetups as $meetup)
                        <tr>
                            <td><span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></td>
                            <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{action('MeetupsController@showmeetup', array($meetup->id))}}}">{{{ Str::limit($meetup->title, 40) }}}</a></td>
                            <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{{action('MeetupsController@showmeetup', array($meetup->id))}}}">{{{ Str::limit($meetup->title, 15) }}}</a></td>
                            <td class="hidden-sm hidden-xs">{{{ Str::limit($meetup->location, 20) }}}</td>
                            <td class="hidden-sm hidden-xs">{{{ Str::limit($meetup->date, 15) }}} at {{{ Str::limit($meetup->time, 15) }}}</td>
                            <td><a href="{{{action('MeetupsController@showedit', array($meetup->id))}}}" class="btn btn-edit">Edit</a></td>
                        </tr>
                        @endforeach
                        @foreach($allgoing as $moremeetup)
                        <tr>
                            <td><span id="voteUpCounts"> {{ $moremeetup['voteupcount'] }}</span> | <span id="voteDownCounts">-{{ $moremeetup['votedowncount'] }}</span></td>
                            <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{action('MeetupsController@showmeetup', array($moremeetup['id']))}}}">{{{ Str::limit($moremeetup['title'], 15)}}}</a></td>
                            <td class="hidden-sm hidden-xs">{{{ Str::limit($moremeetup['location'], 20)}}}</td>
                            <td class="hidden-sm hidden-xs">{{{ Str::limit($moremeetup['date'], 15)}}} at {{{ Str::limit($moremeetup['time'], 15)}}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $allmeetups->links() }}
                </div>

            </div>
        </div>
    </div>
@stop