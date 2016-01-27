@extends('layouts.master')

@section('content')
    
    <div class="container containermargins">
        <div class="row">
            <div class="col-md-2 text-center">
                <div class="row">
                    <img src="/img/sheet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                </div>
                <a class="btn btn-create" role="button" href="{{{ action('SheetsController@create') }}}">Create</a>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">Your Study Sheets</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>votes</th>
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
                                <td><span id="voteUpCounts"> {{ $sheet->voteUpCount() }}</span> | <span id="voteDownCounts">-{{ $sheet->voteDownCount() }}</span></td>
                                <td>{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 40) }}}</a></td>
                                <td>{{{ $sheet->public_or_private }}}</td>
                                <td><a class="btn btn-edit" role="button" href="{{{ action('SheetsController@edit', $sheet->id) }}}">Edit</a></td>
                                <td>{{ Form::model($sheet, array('action' => array('SheetsController@destroy', $sheet->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                                    <button class="btn btn-danger deletebtn" type="submit">Delete</button>
                                {{ Form::close() }}</td>
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