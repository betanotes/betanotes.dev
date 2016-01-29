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
                <a class="btn btn-create longbutton publicbtnmargin" role="button" href="{{{ action('FeedController@showMeetups') }}}">Social Study Groups</a>
            </div>
            <div class="col-md-10">
                <h2 class="text-center">The Social Feed</h2>

                <table class="table table-striped mytable" name="mytable">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th class="hidden-sm hidden-xs">date created</th>
                            <th class="hidden-sm hidden-xs">title</th>
                            <th class="hidden-md hidden-lg">title</th>
                            <th>author</th>
                            <th class="hidden-sm hidden-xs">date</th>
                            <th class="hidden-sm hidden-xs">location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sheets as $sheet)
                            <tr>
                                <td class="hidden-sm hidden-xs">{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 40) }}}</a> <small class="hidden-sm hidden-xs">(sheet)</small></td>
                                <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 15) }}}</a> <small>(sheet)</small></td>
                                <td>{{{ $sheet->user->firstname }}}</td>
                                <td class="mdash hidden-sm hidden-xs">&mdash;</td>
                                <td class="mdash hidden-sm hidden-xs">&mdash;</td>
                            </tr>
                        @endforeach
                        @foreach($notes as $note)
                            <tr>
                                <td class="hidden-sm hidden-xs">{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 40) }}}</a> <small class="hidden-sm hidden-xs">(note)</small></td>
                                <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 15) }}}</a> <small>(note)</small></td>
                                <td>{{{ $note->user->firstname }}}</td>
                                <td class="mdash hidden-sm hidden-xs">&mdash;</td>
                                <td class="mdash hidden-sm hidden-xs">&mdash;</td>
                            </tr>
                        @endforeach
                        @foreach($meetups as $meetup)
                            <tr>
                                <td class="hidden-sm hidden-xs">{{{ $meetup->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class=" hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 40) }}}</a> <small class="hidden-sm hidden-xs">(social study)</small></td>
                                <td class=" hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 15) }}}</a> <small>(social study)</small></td>
                                <td>{{{ User::find($meetup->admin_id)->firstname }}}</td>
                                <td class="hidden-sm hidden-xs">{{{ Str::limit($meetup->date, 20) }}}</td>
                                <td class="hidden-sm hidden-xs">{{{ Str::limit($meetup->location, 20) }}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end col-md-10 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop