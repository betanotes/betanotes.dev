@extends('layouts.master')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="/img/notey2.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <a class="btn btn-create" role="button" href="{{{ action('FeedController@showNotes') }}}">Notes</a>
                <a class="btn btn-create" role="button" href="{{{ action('FeedController@showSheets') }}}">Sheets</a>
                <a class="btn btn-create" role="button" href="{{{ action('FeedController@showMeetups') }}}">Social Study-s</a>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">The Public Feed</h2>

                <table class="table table-hover " name="mytable" id="mytable">
                    <thead>
                        <tr>
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
                                <td>{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 25) }}}</a> <small>(sheet)</small></td>
                                <td>{{{ $sheet->user->firstname }}}</td>
                                <td>N/A</td>
                                <td>N/A</td>
                        @endforeach
                        @foreach($notes as $note)
                            <tr>
                                <td>{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 25) }}}</a> <small>(note)</small></td>
                                <td>{{{ $note->user->firstname }}}</td>
                                <td>N/A</td>
                                <td>N/A</td>
                        @endforeach
                        @foreach($meetups as $meetup)
                            <tr>
                                <td>{{{ $meetup->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 25) }}}</a> <small>(social study)</small></td>
                                <td>{{{ User::find($meetup->admin_id)->firstname }}}</td>
                                <td>{{{ Str::limit($meetup->date, 30) }}}</td>
                                <td>{{{ Str::limit($meetup->location, 30) }}}</td>
                        @endforeach
                    </tbody>
                </table>

                {{-- <div class="text-center">
                    {{ $sheets->links() }}
                </div> --}}
            </div> <!-- end col-md-8 -->
            <div class="col-md-2 text-center">
                <img src="/img/note.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <img src="/img/sheet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <img src="/img/meet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
            </div>

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop