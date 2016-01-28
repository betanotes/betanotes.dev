@extends('layouts.master')

@section('content')
    
    <div class="container containermargins">
        <div class="row">
            <div class="col-md-2 text-center">
                <div class="row">
                    <div class="col-xs-12">
                        <img src="/img/collaborate.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                    </div>
                </div>
                <a class="btn btn-create longbutton publicbtnmargin" role="button" href="{{{ action('FeedController@showNotes') }}}">Social Notes</a>
                <a class="btn btn-create longbutton publicbtnmargin" role="button" href="{{{ action('FeedController@showSheets') }}}">Social Study Sheets</a>
                <a class="btn btn-back longbutton publicbtnmargin" role="button" href="{{{ action('FeedController@showMain') }}}">Back to Social Feed</a>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">Social Study Group</h2>

                <table class="table table-striped mytable" name="mytable">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th class="hidden-sm hidden-xs">date created</th>
                            <th>title</th>
                            <th>host</th>
                            <th class="hidden-sm hidden-xs">date</th>
                            <th class="hidden-sm hidden-xs">location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($meetups as $meetup)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></td>
                                <td class="hidden-sm hidden-xs">{{{ $meetup->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 40) }}}</a></td>
                                <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 18) }}}</a></td>
                                <td>{{{ User::find($meetup->admin_id)->firstname }}}</td>
                                <td class="hidden-sm hidden-xs">{{{ Str::limit($meetup->date, 30) }}}</td>
                                <td class="hidden-sm hidden-xs">{{{ Str::limit($meetup->location, 30) }}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $meetups->links() }}
                </div>
            </div> <!-- end col-md-9 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop