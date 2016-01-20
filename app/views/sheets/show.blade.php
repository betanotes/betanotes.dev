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
            </div>
            <div class="col-md-8">
                <h2 class="text-center">{{{ $sheet->title }}}</h2>
                
                

                @foreach($sheet->lines as $line)
                    <div class="row">
                        <div class="col-xs-6 text-right">
                            <p class="clueclick">{{{ $line->clue }}}</p>
                        </div>
                        <div class="col-xs-6 text-left">
                            <p class="responseslide">{{{ $line->response }}}</p>
                        </div>
                    </div>
                @endforeach
                
                <a href="{{{ action('SheetsController@index') }}}">Back to Sheets Index</a>
            </div> <!-- end col-md-8 -->

        </div> <!-- end row -->
    </div> <!-- end container -->

@stop