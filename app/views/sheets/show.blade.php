@extends('layouts.master')

@section('content')

    <div class="container pushdown">
        <div class="row">
            <div class="col-md-3 text-center">
                <h4 id="infotitle">Sheet Info</h4>
                <ul class="list-group infobox">
                    <li class="list-group-item">Posted by {{{ $sheet->user->firstname }}}</li>
                    <li class="list-group-item">Sheet set to {{{ $sheet->public_or_private}}}</li>
                    <li class="list-group-item">Created at {{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                    <li class="list-group-item">Last update {{{ $sheet->updated_at->setTimezone('America/Chicago')->format('n-j-Y g:i a') }}}</li>
                </ul>
                    <p><a class="btn btn-default" role="button" href="{{{ action('SheetsController@edit', $sheet->slug) }}}">Edit this Sheet</a></p>
                    <p>
                        {{ Form::model($sheet, array('action' => array('SheetsController@destroy', $sheet->id), 'method' => 'DELETE', 'class' => 'deleteform')) }}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        {{ Form::close() }}
                    </p>
                    
            </div>
            <div class="col-md-8">
                <h2 class="text-center">{{{ $sheet->title }}}</h2>
                
                

                @foreach($sheet->lines as $line)
                    <div class="row">
                        <div class="col-xs-6 col-xs-offset-2 text-left">
                            <dl>
                                <dt class="clueclick">{{{ $line->clue }}}</dt>
                                <dd class="responseslide">{{{ $line->response }}}</dd>
                            </dl> 
                        </div> <!-- end col-xs-6 -->
                    </div> <!-- end row -->
                @endforeach
                
                <p id="toggle-btn">Click this to toggle!</p>
                <a href="{{{ action('SheetsController@index') }}}">Back to Sheets Index</a>
            </div> <!-- end col-md-8 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop