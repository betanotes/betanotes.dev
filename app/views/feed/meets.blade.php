@extends('layouts.master')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="/img/notey2.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <a class="btn btn-back" role="button" href="{{{ action('FeedController@showMain') }}}">Back</a>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Public Social Study-s Index</h2>

                <table class="table table-hover">
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
                        @foreach($meetups as $meetup)
                            <tr>
                                <td>{{{ $meetup->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('MeetupsController@showmeetup', $meetup->id) }}}">{{{ Str::limit($meetup->title, 30) }}}</a></td>
                                <td>{{{ User::find($meetup->admin_id)->firstname }}}</td>
                                <td>{{{ Str::limit($meetup->date, 30) }}}</td>
                                <td>{{{ Str::limit($meetup->location, 30) }}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $meetups->links() }}
                </div>
            </div> <!-- end col-md-8 -->
            <div class="col-md-2 text-center">
                <img src="/img/meet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
            </div>

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop