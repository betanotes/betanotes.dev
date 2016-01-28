@extends('layouts.master')

@section('content')
    
    <div class="container  containermargins">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="/img/collaborate.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <a class="btn btn-create publicbtnmargin" role="button" href="{{{ action('FeedController@showNotes') }}}">Public Study Notes</a>
                <a class="btn btn-create publicbtnmargin" role="button" href="{{{ action('FeedController@showMeetups') }}}">Social Study Groups</a>
                <a class="btn btn-back publicbtnmargin" role="button" href="{{{ action('FeedController@showMain') }}}">Back to Public Feed</a>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">Public Study Sheets</h2>

                <table class="table table-striped mytable">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th>date created</th>
                            <th>title</th>
                            <th>author</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sheets as $sheet)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $sheet->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $sheet->voteDownCount() }}</span></td>
                                <td>{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 40) }}}</a></td>
                                <td>{{{ $sheet->user->firstname }}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $sheets->links() }}
                </div>
            </div> <!-- end col-md-9 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop