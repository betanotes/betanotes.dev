@extends('layouts.master')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="/img/collaborate.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <a class="btn btn-create publicbtnmargin" role="button" href="{{{ action('FeedController@showNotes') }}}">Public Study Notes</a>
                <a class="btn btn-create publicbtnmargin" role="button" href="{{{ action('FeedController@showSheets') }}}">Public Study Sheets</a>
                <a class="btn btn-create publicbtnmargin" role="button" href="{{{ action('FeedController@showMeetups') }}}">Social Study Groups</a>
            </div>
            <div class="col-md-10">
                <h2 class="text-center">The Public Feed</h2>

                <table class="table table-hover table-responsive" name="mytable" id="mytable">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th>date created</th>
                            <th>title</th>
                            <th>author</th>
                            <th>date</th>
                            <th>location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sheets as $sheet)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $sheet->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $sheet->voteDownCount() }}</span></td>
                                <td>{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 40) }}}</a> <small>(sheet)</small></td>
                                <td>{{{ $sheet->user->firstname }}}</td>
                                <td>N/A</td>
                                <td>N/A</td>
                            </tr>
                        @endforeach
                        @foreach($notes as $note)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $note->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $note->voteDownCount() }}</span></td>
                                <td>{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 40) }}}</a> <small>(note)</small></td>
                                <td>{{{ $note->user->firstname }}}</td>
                                <td>N/A</td>
                                <td>N/A</td>
                            </tr>
                        @endforeach
                        @foreach($meetups as $meetup)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $meetup->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $meetup->voteDownCount() }}</span></td>
                                <td>{{{ $meetup->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 40) }}}</a> <small>(social study)</small></td>
                                <td>{{{ User::find($meetup->admin_id)->firstname }}}</td>
                                <td>{{{ Str::limit($meetup->date, 20) }}}</td>
                                <td>{{{ Str::limit($meetup->location, 20) }}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end col-md-10 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop