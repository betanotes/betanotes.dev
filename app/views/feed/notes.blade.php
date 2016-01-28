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
                <a class="btn btn-back longbutton publicbtnmargin" role="button" href="{{{ action('FeedController@showMain') }}}">Back to Social Feed</a>
                <a class="btn btn-create longbutton publicbtnmargin" role="button" href="{{{ action('FeedController@showSheets') }}}">Social Study Sheets</a>
                <a class="btn btn-create longbutton publicbtnmargin" role="button" href="{{{ action('FeedController@showMeetups') }}}">Social Study Groups</a>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">Social Notes</h2>

                <table class="table table-striped mytable" name="mytable">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th class="hidden-sm hidden-xs">date created</th>
                            <th>title</th>
                            <th>author</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notes as $note)
                            <tr>
                                <td><span id="voteUpCounts"> {{ $note->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $note->voteDownCount() }}</span></td>
                                <td class="hidden-sm hidden-xs">{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 40) }}}</a></td>
                                <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 18) }}}</a></td>
                                <td>{{{ $note->user->firstname }}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $notes->links() }}
                </div>
            </div> <!-- end col-md-9 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop