@extends('layouts.master')

@section('content')
    
    <div class="container containermargins">
        <div class="row">
            <div class="col-md-2 text-center">
                <div class="row">
                    <img src="/img/sheet.gif" class="img-responsive img-inline img-margintop" alt="Responsive image">
                </div>
                <a class="btn btn-create" role="button" href="{{{ action('SheetsController@create') }}}">Create New Sheet</a>
            </div>
            <div class="col-md-9">
                <h2 class="text-center">Study Sheets</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>votes</th>
                            <th class="hidden-sm hidden-xs">date created</th>
                            <th>title</th>
                            <th class="hidden-sm hidden-xs">privacy setting</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sheets as $sheet)
                            <tr>
                                <td>
                            @if ($sheet->votes()->count() > 0)
                                {{{ $sheet->getVoteScoreAttribute() }}} 
                            @else
                                0
                            @endif
                            </td>
                                <td class="hidden-sm hidden-xs">{{{ $sheet->created_at->setTimezone('America/Chicago')->format('n-j-Y') }}}</td>
                                <td class="hidden-sm hidden-xs"><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 40) }}}</a></td>
                                <td class="hidden-md hidden-lg"><a class="anchortitle" href="{{{ action('SheetsController@show', $sheet->slug) }}}">{{{ Str::limit($sheet->title, 15) }}}</a></td>
                                <td class="hidden-sm hidden-xs">{{{ $sheet->public_or_private }}}</td>
                                <td><a class="btn btn-edit" role="button" href="{{{ action('SheetsController@edit', $sheet->id) }}}">Edit</a></td>
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