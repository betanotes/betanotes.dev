@extends('layouts.master')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="/img/notey2.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                <a class="btn btn-back" role="button" href="{{{ action('FeedController@showMain') }}}">Back</a>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Public Sheets Index</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>date created</th>
                            <th>title</th>
                            <th>author</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sheets as $sheet)
                            <tr>
                                <td>{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 30) }}}</a></td>
                                <td>{{{ $sheet->user->firstname }}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $sheets->links() }}
                </div>
            </div> <!-- end col-md-8 -->
            <div class="col-md-2 text-center">
                <img src="/img/sheet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
            </div>

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop