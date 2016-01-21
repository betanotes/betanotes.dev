@extends('layouts.master')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-2 text-center">
                <p>Welcome, {{{ Auth::user()->firstname }}}</p>
                <a href="{{{ action('SheetsController@create') }}}" class="btn btn-default">Create a Sheet</a>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">Sheets Index</h2>

                <table class="table table-hover">
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
                                <td><a href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 30) }}}</a></td>
                                <td>{{{ $sheet->public_or_private }}}</td>
                                <td><a class="btn btn-default" role="button" href="{{{ action('SheetsController@edit', $sheet->slug) }}}">Edit this Sheet</a></td>
                                <td>{{ Form::model($sheet, array('action' => array('SheetsController@destroy', $sheet->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                {{ Form::close() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {{ $sheets->links() }}
                </div>
            </div> <!-- end col-md-8 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop