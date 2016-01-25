@extends('layouts.master')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="/img/notey2.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
            </div>
            <div class="col-md-8">
                <h2 class="text-center">The Public Feed</h2>

                <table class="table table-hover " name="mytable" id="mytable">
                    <thead>
                        <tr>
                            <th>date created</th>
                            <th>title</th>
                            <th>privacy setting</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sheets as $sheet)
                            <tr>
                                <td>{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 30) }}}</a></td>
                                <td>{{{ $sheet->public_or_private }}}</td>
                        @endforeach
                        @foreach($notes as $note)
                            <tr>
                                <td>{{{ $note->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('NotesController@show', $note->slug) }}}">{{{ Str::limit($note->title, 30) }}}</a></td>
                                <td>{{{ $note->public_or_private }}}</td>
                        @endforeach
                        @foreach($meetups as $meetup)
                            <tr>
                                <td>{{{ $meetup->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 30) }}}</a></td>
                        @endforeach
                    </tbody>
                </table>

                {{-- <div class="text-center">
                    {{ $sheets->links() }}
                </div> --}}
            </div> <!-- end col-md-8 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop